<?php

$ROOT = $_SERVER['DOCUMENT_ROOT']."/"."project_lebo/";
require_once($ROOT."/model/reportsModel.php");
$rpt = new Reports();
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reports</title>
	<link rel="stylesheet" type="text/css" href="../assets/styles.css">
	<style type="text/css">
		body {
			font-family: arial, 'helvetica';
		}
		.page-header {
			font-size: 2em;
			color: #777;
			text-align: center;
			border-bottom: thin solid #ccc;
			margin-top: 50px;
			padding: 5px 0;

		}
		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 15px;
			border-color: #bbb;
		}
		table tr:first-child {
			background-color: #abb3de; /*#E5E8EC;*/
			color: #fff !important;
		}
		table tr:nth-child(even) {
			background-color: #f4f6f9;
		}
		table tr th {
			padding: 8px 5px;
			color: #424953;
			border-color: #bbb;
		}
		table tr td {
			border-color: #ddd;
			color: #444;
			padding: 5px;
		}
		.tbl {
			display: inline-flex;
			width: 30%;
			vertical-align: top;
			margin: auto 5px;
		}
	</style>
</head>
<body>
<div class="container">
	<?php include('menubar.php'); ?>

	<div class="page-header">MIS Reports</div>

	<div class="table tbl">
		<table border="1">
			<tr><th colspan="2">Summary One</th></tr>
			<th>COUNT</th><th>DAYS</th>
			<?php foreach($rpt->report_summ1() as $item): ?>
			<tr>
				<td><?php echo $item->TOTAL_COUNT; ?></td>
				<td><?php echo $item->SUBMIT_DAY; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="table tbl">
		<table border="1">
			<tr><th colspan="3">Summary Two</th></tr>
			<th>COUNT</th><th>MODULES</th><th>DAYS</th>
			<?php foreach($rpt->report_summ2() as $item): ?>
			<tr>
				<td><?php echo $item->TOTAL_COUNT; ?></td>
				<td><?php echo $item->MODULES; ?></td>
				<td><?php echo $item->DAYS; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="table tbl">
		<table border="1">
			<tr><th colspan="2">Trends Report One</th></tr>
			<th>TOTAL MODULES</th><th>PER WEEK</th>
			<?php foreach($rpt->report_trends1() as $item): ?>
			<tr>
				<td><?php echo $item->TOTAL_MODULES; ?></td>
				<td><?php echo $item->PER_WEEK; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="table tbl">
		<table border="1">
			<tr><th colspan="2">Trends Report Two</th></tr>
			<th>TOTAL COUNT</th><th>WEEKS NUMBER</th>
			<?php foreach($rpt->report_trends2() as $item): ?>
			<tr>
				<td><?php echo $item->TOTAL_COUNT; ?></td>
				<td><?php echo $item->WEEKS_NUMBER; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="table tbl">
		<table border="1">
			<tr><th colspan="2">Trends Report Three</th></tr>
			<th>Exam Type</th><th>Exam Times</th>
			<?php foreach($rpt->report_trends3() as $item): ?>
			<tr>
				<td><?php echo $item->TypeOfExam; ?></td>
				<td><?php echo date('H:i A', strtotime($item->EVENING_TIMES)); ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="table tbl">
		<table border="1">
			<tr><th colspan="2">Exception Reports One</th></tr>
			<th>TOTAL RECORDS</th><th>EXAM DATES</th>
			<?php foreach($rpt->rpt_exception1() as $item): ?>
			<tr>
				<td><?php echo $item->TOTAL_RECORDS; ?></td>
				<td><?php echo $item->EXAM_DATES; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="table tbl">
		<table border="1">
			<tr><th colspan="2">Exception Reports Two</th></tr>
			<th>TOTAL COUNT</th><th>MODULES</th>
			<?php foreach($rpt->rpt_exception2() as $item): ?>
			<tr>
				<td><?php echo $item->TOTAL_COUNT; ?></td>
				<td><?php echo $item->MODULES; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="table tbl">
		<table border="1">
			<tr><th colspan="2">Predictive Reports</th></tr>
			<th>TOTAL COUNT</th><th>EXAMS SUBMISSIONS</th>
			<?php foreach($rpt->rpt_predictive() as $item): ?>
			<tr>
				<td><?php echo $item->TOTAL_COUNT; ?></td>
				<td><?php echo $item->EXAMS_SUBMISSIONS; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>

</body>

<?php include('footer.php'); ?>

</html>