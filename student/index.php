<?php 
	include('header.php');

	if(isset($_SESSION['studentNum'])) { 
		header("login.php");
	}

	if(isset($_SESSION['studentNum'])) {
		$rows = $exam->getStudentAdmissions($_SESSION['studentNum']);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome::Student Portal</title>
	
	<style type="text/css">
		body {
			font-family: arial, 'helvetica';
		}

		.container {

		}
		.page-header {
			font-size: 2em;
			color: #777;
			text-align: center;
			border-bottom: thin solid #ccc;
			margin-top: 50px;
			padding: 5px 0;

		}
		.charts {
			width: 48%;
			display: inline-block;
		}
		.card {
			width: 300px;
			border: thin solid #bbb;
			border-radius: 5px;
			display: inline-block;
			text-align: center;
			padding: 10px;
			margin-right: 8px;
		}
	</style>
</head>
<body>
	<?php include('menubar.php'); ?>

	<div class="page-header">My Portal</div>

	<br>
	<center>
	<div style="margin: 0 auto;">
	<div class="card" style="background-color: #C8EAD1;">
		<h2 style="color: #397D54;">Modules Registered</h2>
		<h1 style="color: #397D54;"><?php echo count($rows); ?></h1>
	</div>
	<div class="card" style="background-color: #C8EAD1;">
		<h2 style="color: #397D54;">Available Examinations</h2>
		<h1 style="color: #397D54;"><?php echo count($rows); ?></h1>
	</div>
	</div>
</center>


	<div class="" style="width: 80%; margin: 20px auto;">
		
		<?php
		if($rows != false) {
			foreach($rows as $row): 
			$data = $exam->getExamInfo($row->Module_Code);
		?>
		<div class="card">
			<div><h4><?php echo strtoupper($data->moduleCode); ?></h4></div>
			<div><?php echo date('D, d/M/Y', strtotime($data->exam_Date)); ?></div>
			<div><?php echo date('H:i A', strtotime($data->StartTime)); ?></div><br>
			<div><a href="examinfo.php?action=examinfo&id=<?php echo $data->moduleCode; ?>" class="btn" style="text-decoration: none; margin-top: 15px !important;">Show Exam</a></div>
			<br>
		</div>
		<?php endforeach; 

		} else { ?>
			<div class="alert alert-info">You have no examination available at the moment.</div>
		<?php } ?>
	</div>

</body>
</html>