<?php
include('header.php');

$ROOT = $_SERVER['DOCUMENT_ROOT']."/"."project_lebo/";
require_once($ROOT."/model/reportsModel.php");

$rp = new Reports();
$exams = $exam->getAllExams();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome::Student Portal</title>
	<!-- <link rel="stylesheet" type="text/css" href="../assets/styles.css"> -->
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
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
		.charts {
			width: 48%;
			display: inline-block;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php include('menubar.php'); ?>

		<div class="page-header">My Dashboard</div>

		<div class="">
			<br>
			<div class="charts">
				<canvas id="myChart1" width="400" height="400"></canvas>
			</div>
			<div class="charts">
				<canvas id="myChart2" width="350" height="350"></canvas>
			</div>
		</div>
	</div>
	<?php 
		$predictive = $rp->rpt_predictive();
		$summary = $rp->report_summ1();
	?>
	<!-- <script src="../assets/jquery-1.12.4.min.js" type="text/javascript"></script> -->
	<!-- <script src="../assets/Charts.js" type="text/javascript"></script> -->

	<?php include('footer.php'); ?>

	<script type="text/javascript">
	//code documentation found at https://www.chartjs.org/
	function barChart() {
	var dataList = <?php echo json_encode($predictive); ?>;
	// Define the data 
	var labels = [];
	var data = [];
	dataList.forEach(function(v) {
		labels.push(v.EXAMS_SUBMISSIONS);
		data.push(v.TOTAL_COUNT);
	});

	var ctx = document.getElementById("myChart1").getContext('2d');
	var myChart = new Chart(ctx, {
	type: 'horizontalBar', 
	data: {
		labels: labels, 
		datasets: [{
		label: 'Exams Predictive Report', // Name the series 
		data: data, // Specify the data values array 
			backgroundColor: [ // Specify custom colors
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)'
			], 
			borderColor: [ // Add custom color borders
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)',
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)'
			], 
			borderWidth: 1 // Specify bar border width 
		}] 
	},
		options: {
			responsive: true, // Instruct chart js to respond nicely.
			maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
		}
	});
} barChart();

function doughnutChart() {
	var dataList = <?php echo json_encode($summary); ?>;
	var labels = [];
	var data = [];
	dataList.forEach(function(v) {
		labels.push(v.SUBMIT_DAY);
		data.push(v.TOTAL_COUNT);
	});
	var ctx = document.getElementById("myChart2").getContext('2d');
	var myChart = new Chart(ctx, { 
		type: 'doughnut', 
		data: { 
		labels: labels, //add labels to charts, 
		datasets: [{
				data: data, //[100, 150, 250, 400], // Specify the data in values array 
				borderColor: ['#2196f38c', '#f443368c', '#3f51b570', '#00968896','#2196f38c', '#f443368c', '#3f51b570', '#00968896', '#3f51b570', '#00968896'], // Add custom color border
				backgroundColor: ['#2196f38c', '#f443368c', '#3f51b570', '#00968896','#2196f38c', '#f443368c', '#3f51b570', '#00968896', '#3f51b570', '#00968896'], // Add custom color background (Points and Fill) 
				borderWidth: 1 // Specify bar border width 
			}
		]}, 
		options: { 
			responsive: true, // Instruct chart js to respond nicely. 
			maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
		}
	});
} doughnutChart();

</script>
</body>
</html>