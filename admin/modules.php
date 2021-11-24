
<?php

include('header.php');
include('menubar.php');

require_once('../model/studentModel.php');

$student = new Student();

if(isset($_REQUEST['code'])) {
	$moduleCode = strtoupper($_REQUEST['code']);
	$info = $module->getOneModuleInfo($moduleCode);
	$rows = $exam->getAllAdmissions($moduleCode);
	$count = ($rows != false) ? count($rows) : 0;
}

$modules = $module->getAllModules();
?>
<div class="container">
	<h3 class="page-header">Show Admission Information</h3>

	<div class="row">

		<?php if(!isset($_REQUEST['code'])) { ?>
		<table class="table table-bordered" id="tableRows">
			<thead>
				<th>Module Code</th><th>Action</th>
			</thead>
			<tbody>
				<?php foreach($modules as $data): ?>
				<tr>
					<td><?php echo $data->Module_Code; ?></td>
					<td><a href="?code=<?php echo $data->Module_Code; ?>" class="btn">Show Info</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php } else { ?>
		<div class="col-md-12 mx-auto">
			<div class="card">
				<div class="card-body">
					<a href="modules.php" class="btn btn-sm btn-info">Go Back</a>
					<div>Total Registered Students for <?php echo $moduleCode; ?> <span class="badge badge-info float-right"><?php echo $count; ?></span></div>
					<table class="table table-bordered">
						<thead>
							<th>StudentID</th><th>Name</th><th>Surname</th><th>Email</th>
						</thead>
					<?php 
					if($rows != false) {
						foreach($rows as $row):
						$rec = $student->getStudentInformation($row->Student_Number);
						?>
						<tr>
							<td><?php echo $rec->Student_Number; ?></td>
							<td><?php echo $rec->Student_Name; ?></td>
							<td><?php echo $rec->Student_Surname; ?></td>
							<td><?php echo $rec->Email; ?></td>
						</tr>
					<?php endforeach; ?>
					<?php }  else  { ?>
						<tr><td colspan="4">
							<div class="alert alert-info">There are no students registered for this module.</div>
						</td></tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<?php } ?>

	</div>
</div>

<?php include('footer.php'); ?>

<script type="text/javascript">
	$(function() {
		$("#tableRows").DataTables();
	});
</script>