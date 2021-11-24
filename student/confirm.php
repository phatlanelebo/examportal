<?php

include('header.php');
include('menubar.php');

if(isset($_SESSION['studentNum'])) { 
	header("login.php");
}

$moduleCode = strtoupper($_POST['moduleCode']);

?>


<h3 class="page-header">Confirm Answers</h3>

	
<div class="" style="width: 500px; margin: 50px auto; border: thin solid #bbb; border-radius: 5px; padding: 20px;">

<h4>Total Number Of Questions (<?php echo count($_POST)-2; ?>) </h4>

	<form action="controller.php" method="POST" enctype="application/x-www-forms-urlencoded">
	<input type="hidden" name="moduleCode" value="<?php echo $moduleCode; ?>">
	<input type="hidden" name="total_Questions" value="<?php echo count($_POST)-2; ?>">
	<?php

	if(isset($_POST['action']) && $_REQUEST['action'] == "finish") {
		array_pop($_POST);
		array_shift($_POST);
		$count = 0;

		foreach($_POST as $key => $value) :
			$count++;
		?>
		<input type="hidden" name="question<?php echo $count; ?>" value="<?php echo $value; ?>">
		<?php
			echo $count." - ".$value."<br>";
		endforeach;
	}
	?>
		<br><br>
		<center>
		<a href="javascript:goBack()" class="btn" style="text-decoration: none;">Back</a>
		<button type="submit" class="btn" name="action" value="submit-exam">Finish</button>
		</center>
	</form>

</div>

<script type="text/javascript">
	function goBack() {
		window.history.go(-1);
	}
</script>