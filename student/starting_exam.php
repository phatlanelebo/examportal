<?php 
	include('header.php');
	include('menubar.php');

	if(isset($_SESSION['studentNum'])) { 
		header("login.php");
	}

	if(isset($_REQUEST['id'])) {
		$info = $exam->getExamInfo($_REQUEST['id']);
	}

?>
<style type="text/css">
	table tr:nth-child(even) {
		background-color: #f7f7f7;
	}
</style>

<div class="page-header">Exam Started</div>

<div class="row">
	<div class="col-md-4 mt-2 mx-auto">
		<div class="card">
			<div class="card-body">
				<div><a href="<?php echo "../exam_paper/".$info->moduleCode.'_'.$info->exam_Date.'.pdf'; ?>" class="mb-3"><?php echo $info->moduleCode.'_'.$info->exam_Date.'.pdf'; ?></a></div>
				<div><a href="<?php echo "../exam_paper/".$info->moduleCode.'_'.$info->exam_Date.'.pdf'; ?>" class="btn btn-primary mb-2"><i class="fa fa-download"></i> Download paper</a></div>
				<div class="text-muted">Download question paper above.</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 mt-2 mx-auto">
		<div class="card">
			<div class="card-body">
				<h3><div id="timer_lapse">Time Left 0:0:0</div></h3>
			</div>
		</div>
		<div id="message"></div>
	</div>
</div>

<div style="width: 80%; margin: 20px auto; border: thin solid #bbb; border-radius: 5px; padding: 20px;">
	Total Questions: <span class="badge badge-info"><?php echo $info->num_Question; ?></span>
	<table border="0" class="table" style="text-align: center;">
		<th></th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th>
		<form action="confirm.php" method="POST" enctype="">
			<input type="hidden" name="moduleCode" value="<?php echo $info->moduleCode; ?>">
		<?php for($i = 1; $i <= $info->num_Question; $i++): ?>
			<tr>
				<td>Question <?php echo $i; ?></td>
				<td><input type="radio" name="<?php echo $i; ?>" value="A"></td>
				<td><input type="radio" name="<?php echo $i; ?>" value="B"></td>
				<td><input type="radio" name="<?php echo $i; ?>" value="C"></td>
				<td><input type="radio" name="<?php echo $i; ?>" value="D"></td>
				<td><input type="radio" name="<?php echo $i; ?>" value="E"></td>
			</tr>
		<?php endfor; ?>
		<tr>
			<td colspan="6" align="right">
				<br>
				<button type="submit" class="btn" name="action" value="finish">Submit Answers</button>
			</td>
		</tr>
		</form>
	</table>
</div>

<?php include('footer.php'); ?>

<script type="text/javascript">
	// Set the date we're counting down to
	var start_time = "<?php echo $info->exam_Date.' '.$info->CompletionTime; ?>";

	var countDownDate = new Date(start_time).getTime();

	// Update the count down every 1 second
	var x = setInterval(function() {

	  // Get today's date and time
	  var now = new Date().getTime();

	  // Find the distance between now and the count down date
	  var counter = countDownDate - now;

	  // Time calculations for days, hours, minutes and seconds
	  // var days = Math.floor(counter / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((counter % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((counter % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((counter % (1000 * 60)) / 1000);

	  // Display the result in the element with id="demo"
	  document.getElementById("timer_lapse").innerHTML = "Time Left: "+hours + "h "+ minutes + "m " + seconds + "s ";

	  // If the count down is over, write some text 
	  if(hours <=0 && minutes <= 14){
	    document.getElementById("message").innerHTML = "<div class='alert alert-info mt-2'>You have less than 14 minutes to submit</div>";
	  }
	  if(hours <=0 && minutes <= 10){
	    document.getElementById("message").innerHTML = "<div class='alert alert-info mt-2'>You have less than 10 minutes to submit</div>";
	  }
	  if(hours <=0 && minutes <= 5){
	    document.getElementById("message").innerHTML = "<div class='alert alert-danger mt-2'>You have less than 5 minutes to submit</div>";
	  }

	  // If the count down is finished, show message on page
	  if (counter < 0) {
	    clearInterval(x);
	    document.getElementById("timer_lapse").innerHTML = "Time Left: 0h 0m 0s";
	    document.getElementById("message").innerHTML = "<div class='alert alert-danger mt-2'>Your examination time has EXPIRED!</div>";
	  }

	}, 1000);

</script>