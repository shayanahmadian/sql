<?php include_once('./partials/header.php'); ?>
<?php include_once('./partials/navbar.php'); ?>
<?php 
	if(isset($_POST['action']) && $_POST['action'] == "delete") {
		delete_field_courses($_POST);
	}

	if(isset($_POST['action']) && $_POST['action'] == "add_course") {
		add_field_courses($_POST);
	}
?>
<?php
	$fields = get_fields();
	$courses = get_courses();
?>


<?php 
	
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-12">
			<div class="page_title">
				لیست دروس هر رشته
			</div>
		</div>
	</div>

		<?php
			$index = 0; 
			foreach ($fields as $key => $value) { 
			$field_courses = get_field_courses($value['id']); 
			
		?>
			<?php if($index %2 == 0) { ?>
	<div class="row rtl mt-4">
			<?php } ?>
			<div class="col-sm-6">
				<div class="card mb-3">
				  <div class="card-header">
				  	<span class="text-right float-right">
				  	<?=$value['name']?>
				  	</span>
				  	<span class="float-left">
				  		<button data-id="<?=$value['id']?>"
				  		class="btn btn-sm btn-outline-primary add_course" data-toggle="modal" data-target="#exampleModal">+</button> 
				  	</span>
				  	</div>
				  <div class="card-body">
				    <ul class="list-group list-group-flush">
				    	<?php 
				    		foreach ($field_courses as $key2 => $value2) {
				    			$course = get_course($value2['course_id']);
				    	?>

					  <li class="list-group-item">
					  	<div class="row rtl text-center">
					  		<div class="col-sm-4"><?= $course['name']?></div>
					  		<div class="col-sm-4"><?= $course['unit']?></div>
					  		<div class="col-sm-4"><button class="btn btn-sm btn-outline-danger delete" 
					  			data-course="<?= $course['id']?>"
					  			data-field="<?= $value['id']?>">حذف</button></div>
					  	</div>
					  	
				  		
					  	</li>
					<?php } ?>
					</ul>
					</ul>
				  </div>
				</div>
			</div>
				
			<?php if($index %2 == 1) { ?>
				</div>
			<?php } ?>

		<?php
			$index ++; 
			} 
		?>

	</div>
</div>

<form method="post" action="./field_courses.php" style="display: none;">
	<input type="hidden" name="action" value="delete">
	<input type="hidden" name="course_id" id="delete_course_id" value="">
	<input type="hidden" name="field_id" id="delete_field_id" value="">
	<input type="submit" id="delete_submit">
</form>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header rtl">
        <h5 class="modal-title text-right" id="exampleModalLabel">اضافه کردن درس جدید</h5>
      </div>
      <div class="modal-body">
        <form method="post" accept="./field_courses.php">
			<input type="hidden" name="action" value="add_course">

        	<div class="form-group rtl text-right">
        		<input type="hidden" name="field_id" id="add_field_id" value="">
        		<label for="">درس :</label>
        		<select name="course_id" class="form-control">
        			<?php foreach ($courses as $key => $value) { ?>
        				<option value="<?=$value['id']?>"><?= $value['name']?></option>
        			<?php } ?>
        		</select>
        	</div>
        	<div class="form-group">
        		<input type="submit" class="btn btn-block btn-outline-secondary" value="اضافه کردن">
        </form>
      </div>
    </div>
  </div>
</div>


<?php include_once('./partials/footer.php'); ?>

<script>
    $("document").ready(function() {

		
		$("#add_toggle_button").click(function(){
			$(".add_container").slideToggle("slow");
		});

		$(".add_course").click(function(){
			var field_id = $(this).attr('data-id');
			$("#add_field_id").val(field_id);
		});


        $(".delete").click(function() {
			var course_id = $(this).attr('data-course');
			var field_id = $(this).attr('data-field');
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
					
					$("#delete_field_id").val(field_id);
					$("#delete_course_id").val(course_id);
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