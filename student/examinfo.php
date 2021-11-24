<?php 
	include('header.php');

	include('menubar.php');

	if(isset($_SESSION['studentNum'])) { 
		header("login.php");
	}

	if(isset($_REQUEST['id'])) {
		$info = $exam->getExamInfo($_REQUEST['id']);
	}

	$isLocked = ($info->exam_Date == date('Y-m-d')) ? '' : 'disabled';
	$isStudentWrote = ($exam->isStudentWrote($_SESSION['studentNum'], $info->moduleCode)) ? 'disabled' : '';

?>

<div class="page-header">Student Information</div>


<div class="" style="width: 500px; margin: 50px auto; border: thin solid #bbb; border-radius: 5px; padding: 20px;">
	<form action="" method="POST" enctype="">
		<div>
			
			<table class="table">
				<tr>
					<td>Module Code:</td><td><?php echo strtoupper($info->moduleCode); ?></td>
				</tr>
				<tr>
					<td>Date:</td><td><?php echo date('d/m/Y', strtotime($info->exam_Date)); ?></td>
				</tr>
				<tr>
					<td>Start Time:</td><td><?php echo date('H:i A', strtotime($info->StartTime)); ?></td>
				</tr>
				<tr>
					<td>End Time:</td><td><?php echo date('H:i A', strtotime($info->CompletionTime)); ?></td>
				</tr>
				<tr>
					<td>Total Questions</td><td><?php echo $info->num_Question; ?></td>
				</tr>
			</table>
		</div>
		<br>
		<div>
			<center>
			<a href="index.php" style="text-decoration: none;" class="btn">Back</a>
			<a href="declare.php?id=<?php echo $_REQUEST['id']; ?>" style="text-decoration: none;" class="btn <?php echo $isLocked; echo $isStudentWrote; ?>">Start</a>
			</center>
		</div>
	</form>
</div>

