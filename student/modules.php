
<?php 
	include('header.php');
	include('menubar.php'); 

	if(isset($_SESSION['studentNum'])) { 
		header("login.php");
	}

	if(isset($_SESSION['studentNum'])) {
		$rows = $exam->getStudentAdmissions($_SESSION['studentNum']);
	}

?>

<div class="page-header">Registered Modules</div>

<div class="" style="width: 80%; margin: 20px auto;">
		
	<div class="card">
		<div class="card-body">
			<h4>Currently Registered Modules <span class="float-right badge badge-primary">Total: <?php echo count($rows)?></span></h4><hr>
			<?php foreach($rows as $data): ?>
				<div class="mt-2">
					<?php echo $data->Module_Code; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</div>
