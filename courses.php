<?php include_once('./partials/header.php'); ?>
<?php include_once('./partials/navbar.php'); ?>

<?php
	$course_to_update = [];
	if(isset($_GET['action']) && $_GET['action'] == "edit"){
		$id = $_GET['id'];
		$course_to_update = get_course($id);
	}

	if( isset($_POST['action']) && $_POST['action'] == "delete"){
		delete_course($_POST['id']);
	}

	if( isset($_POST['action']) && $_POST['action'] == "add"){
		add_course($_POST);
	}

	if( isset($_POST['action']) && $_POST['action'] == "update"){
		update_course($_POST);
	}
?>


<?php 
	$courses = get_courses();
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="page_title">
				لیست  دروس
            </div>
        </div>

		<div class="col-sm-12">
            <div class="row rtl">
				<div class="col-sm-4">
					<div class="btn btn-block btn-lg btn-outline-primary" id="add_toggle_button">
						افزودن درس جدید
					</div>
				</div>
			</div>
			<div class="row justify-content-center mt-2">
				<div class="col-sm-12 add_container">
					<div class="card">
						<div class="card-body rtl text-right">
							<form method="post" action="./courses.php">
								<input type="hidden" name="action" value="add">
								<div class="form-group">
									<label>نام :</label>
   									<input type="text" name="name" class="form-control" 
										placeholder="نام را وارد کنید" required>
								</div>
								
								<div class="form-group">
									<label>تعداد واحد</label>
									<input type="text"  
									placeholder="تعداد واحد را وارد کنید" 
									name="unit" class="form-control" required>
								</div>

								<div class="form-group">
									<input type="submit" class="btn btn-block btn-lg btn-outline-secondary" value="افزودن اطلاعات">
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
                        <th>نام درس</th>
                        <th> تعداد واحد</th>
                        <th>عمیلات ها</th>
                    </tr>
                </thead>
                <tbody class="text-center">
					<?php foreach ($courses as $key => $value) { 
						$url = "./courses.php?action=edit&id=" . $value['id'];
						?>
                        <tr>
                            <td><?= $value['id'] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['unit'] ?></td>
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

<form method="post" action="./courses.php" style="display: none;">
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
        <form method="post" action="./courses.php">
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="id" value="<?=$course_to_update['id']?>">

			<div class="form-group">
				<label>نام :</label>
				<input type="text" name="name" class="form-control"
					value="<?=$course_to_update['name']?>" 
					placeholder="نام را وارد کنید" required>
			</div>

			<div class="form-group">
				<label>تعداد واحد</label>
				<input type="text" placeholder="تعداد واحد را وارد کنید" 
				value="<?=$course_to_update['unit']?>"
				name="unit" class="form-control" required>
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
					'حذف شد!',
					'عملیات با موفقیت انجام شد.',
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