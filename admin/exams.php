
<?php

include('header.php');
include('menubar.php');

if(isset($_SESSION['studentNum'])) { 
	header("login.php");
}

$exams = $exam->getAllExams();

?>
<div class="container">
	<h3 class="page-header">Examinations</h3>
	<a href="createexam.php" style="float: right; margin: 10px auto 15px auto; text-decoration: none;" class="btn">Add Exam</a>

	<div class="">
		<table class="table table-bordered table-striped">
			<thead>
				<th>Module Code</th><th>Exam Date</th>
				<th>Start Time</th><th>End Time</th>
				<th>Total Questions</th><th>Action</th>
			</thead>
			<tbody>
				<?php foreach($exams as $data): ?>
				<tr>
					<td><?php echo $data->moduleCode; ?></td>
					<td><?php echo date('d-m-Y', strtotime( $data->exam_Date)); ?></td>
					<td><?php echo date('H:i A', strtotime($data->StartTime)); ?></td>
					<td><?php echo date('H:i A', strtotime($data->CompletionTime)); ?></td>
					<td><?php echo $data->num_Question; ?></td>
					<td><a href="edit_exam.php?action=edit&id=<?php echo $data->exam_ID; ?>" class="btn">Edit</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div>
</div>

<?php include('footer.php'); ?>

<script type="text/javascript">
	$(function() {
		$("#tableRows").DataTables();
	});
</script>