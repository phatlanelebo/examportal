<?php

include('header.php');
include('menubar.php');

if(isset($_SESSION['studentNum'])) { 
	header("login.php");
}

$modules = $module->getAllModules();

?>
<br>
<a href="exams.php" style="float: right; margin: 50px 10px 0 auto; text-decoration: none; font-size: 1em !important;" class="btn">Back</a>
<h3 class="page-header">Create New Exam </h3>

<div class="container">
	<h4><center>Add New Exam</center></h4>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-body">
					<form action="controller.php" method="POST" enctype="multipart/form-data">
						<div class="mt-3">
							<select class="form-control" name="module_code">
								<option>Select Module</option>
								<?php foreach($modules as $data): ?>
								<option><?php echo $data->Module_Code; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="mt-3">
							<select class="form-control" name="exam_type">
								<option value="">Select Exam Type</option>
								<option value="MCQ">MCQ</option>
								<option value="Fill-In">Fill-In</option>
								<option value="Document-upload">Document Upload</option>
							</select>
						</div>
						<div class="mt-3">
							<input type="date" class="form-control" name="exam_date" placeholder="">
						</div>
						<div class="mt-3">
							<input type="time" class="form-control" name="start_time" placeholder="">
						</div>
						<div class="mt-3">
							<input type="time" class="form-control" name="end_time" placeholder="">
						</div>
						<div class="mt-3">
							<input type="number" class="form-control" name="number_of_questions" placeholder="number of questions">
						</div>
						<div class="mt-3">
							<input type="file" class="form-control" name="question_paper">
						</div>
						<div class="mt-3" align="right">
							<button type="submit" name="action" value="create-exam" class="btn">Add New</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>