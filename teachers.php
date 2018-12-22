<?php include_once('./partials/header.php'); ?>
<?php include_once('./partials/navbar.php'); ?>

<?php
	$teacher_to_update = [];
	if(isset($_GET['action']) && $_GET['action'] == "edit"){
		$id = $_GET['id'];
		$teacher_to_update = get_teacher($id);
	}

	if( isset($_POST['action']) && $_POST['action'] == "delete"){
		delete_teacher($_POST['id']);
	}

	if( isset($_POST['action']) && $_POST['action'] == "add"){
		add_teacher($_POST);
	}

	
	if( isset($_POST['action']) && $_POST['action'] == "update"){
		update_teacher($_POST);
	}
?>


<?php 
	$teachers = get_teachers();
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="page_title">
                لیست اساتید
            </div>
        </div>

		<div class="col-sm-12">
            <div class="row rtl">
				<div class="col-sm-4">
					<div class="btn btn-block btn-lg btn-outline-primary" id="add_toggle_button">
						افزودن استاد جدید
					</div>
				</div>
			</div>
			<div class="row justify-content-center mt-2">
				<div class="col-sm-12 add_container">
					<div class="card">
						<div class="card-body rtl text-right">
							<form method="post" action="./teachers.php">
								<input type="hidden" name="action" value="add">
								<div class="form-group">
									<label>نام :</label>
   									<input type="text" name="firstname" class="form-control" 
										placeholder="نام را وارد کنید" required>
								</div>

								<div class="form-group">
									<label>نام خانوادگی :</label>
									<input type="text" placeholder="نام خانوادگی را وارد کنید"  
									name="lastname" class="form-control" required>
								</div>

								<div class="form-group">
									<label>سن :</label>
									<input type="text"  
									placeholder="سن را وارد کنید" 
									name="age" class="form-control" required>
								</div>

								<div class="form-group">
									<input type="submit" class="btn btn-block btn-lg btn-outline-secondary" value="اضافه شود">
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="col-sm-12 mt-4">
            <table class="table table-striped table-hover rtl">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>#</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
						<th>سن</th>
                        <th>عمیلات ها</th>
                    </tr>
                </thead>
                <tbody class="text-center">
					<?php foreach ($teachers as $key => $value) { 
						$url = "./teachers.php?action=edit&id=" . $value['id'];
						?>
                        <tr>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['firstname'] ?></td>
                            <td><?= $value['lastname'] ?></td>
							<td><?= $value['age'] ?></td>
                            <td>
                                <a class="btn btn-sm btn-secondary" 
                                data-id="<?= $value['id'] ?>"
								href="<?=$url?>" 
                                >ویرایش</a>

                                <button class="btn btn-sm btn-danger delete" 
                                data-id="<?= $value['id'] ?>"
                                >حذف</button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<form method="post" action="./teachers.php" style="display: none;">
	<input type="hidden" name="action" value="delete">
	<input type="hidden" name="id" id="delete_value" value="">
	<input type="submit" id="delete_submit">
</form>

<button type="button" id="modal_toggle" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display: none;">
  Launch demo modal
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ویرایش اطلاعات</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body rtl text-right">
        <form method="post" action="./teachers.php">
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="id" value="<?=$teacher_to_update['id']?>">
			<div class="form-group">
				<label>نام :</label>
				<input type="text" name="firstname" class="form-control"
					value="<?=$teacher_to_update['firstname']?>" 
					placeholder="نام را وارد کنید" required>
			</div>

			<div class="form-group">
				<label>نام خانوادگی :</label>
				<input type="text" placeholder="نام خانوادگی را وارد کنید" 
				value="<?=$teacher_to_update['lastname']?>"
				name="lastname" class="form-control" required>
			</div>

			<div class="form-group">
				<label>سن :</label>
				<input type="text"
				value="<?=$teacher_to_update['age']?>" 
				placeholder="سن را وارد کنید" name="age" class="form-control" required>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-block btn-lg btn-outline-secondary" value="ویرایش کردن">
			</div>
		</form>
      </div>
    </div>
  </div>
</div>


<?php include_once('./partials/footer.php'); ?>

<script>
    $("document").ready(function() {

		<?php if(isset($_GET['action']) && $_GET['action'] == 'edit') { ?>
			$("#modal_toggle").click();
		<?php } ?>

		$("#add_toggle_button").click(function(){
			$(".add_container").slideToggle("slow");
		});


        $(".delete").click(function() {
			var id = $(this).attr('data-id');
            Swal({
				title: 'حذف',
				text: "آیا از انجام این عملیات اطمینان دارید ؟",
				type: 'error',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'حذف شود',
				cancelButtonText: 'لغو'
				}).then((result) => {
				if (result.value) {
					
					$("#delete_value").val(id);
					Swal(
					'Deleted!',
					'Your file has been deleted.',
					'success'
					);
					setTimeout(function() {
					$("#delete_submit").click();
					}, 800);
					
				}
			});
        });
    });
</script>