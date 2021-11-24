<?php

include('header.php');
include('menubar.php');

if(isset($_REQUEST['action'])) {
	$data = $exam->getExamInfo($_REQUEST['id']);
}
$modules = $module->getAllModules();

?>

<br>
<a href="exams.php" style="float: right; margin: 50px 10px 0 auto; text-decoration: none; font-size: 1em !important;" class="btn">Back</a>
<h3 class="page-header">Update <?php echo $data->moduleCode; ?> Exam Information </h3>

<div class="container">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card mt-2">
				<div class="card-body">
					<form action="controller.php" method="POST" enctype="multipart/form-data">
						<div class="mt-3">
							<select class="form-control" name="module_code">
								<option>Select Module</option>
								<?php foreach($modules as $row): ?>
								<option value="<?php echo $row->Module_Code; ?>" <?php echo ($data->moduleCode == $row->Module_Code) ? 'Selected' : ''; ?> >
									<?php echo $row->Module_Code; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="mt-3">
							<select class="form-control" name="exam_type">
								<option value="">Select Exam Type</option>
								<option <?php echo ($data->exam_type=="MCQ") ? "Selected" : '';?> value="MCQ">MCQ</option>
								<option <?php echo ($data->exam_type=="Fill-In") ? "Selected" : '';?> value="Fill-In">Fill-In</option>
								<option <?php echo ($data->exam_type=="Document-upload") ? "Selected" : '';?> value="Document-upload">Document Upload</option>
							</select>
						</div>
						<div class="mt-3">
							<input type="hidden" name="examID" value="<?php echo $_REQUEST['id']; ?>">
							<input type="date" class="form-control" name="exam_date" value="<?php echo $data->exam_Date; ?>">
						</div>
						<div class="mt-3">
							<input type="time" class="form-control" name="start_time" value="<?php echo $data->StartTime; ?>">
						</div>
						<div class="mt-3">
							<input type="time" class="form-control" name="end_time" value="<?php echo $data->CompletionTime; ?>">
						</div>
						<div class="mt-3">
							<input type="number" class="form-control" name="number_of_questions" value="<?php echo $data->num_Question; ?>">
						</div>
						<div class="mt-3">
							<input type="file" class="form-control" name="question_paper">
						</div>
						<div class="mt-3" align="right">
							<button type="submit" name="action" value="update-exam" class="btn">Update Exam</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>