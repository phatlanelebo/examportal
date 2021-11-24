<?php 
	include('header.php');

	include('menubar.php');

?>

<div class="page-header">Student Declaration</div>


<div class="" style="width: 500px; margin: 50px auto; border: thin solid #bbb; border-radius: 5px; padding: 20px;">
	<form action="" method="POST" enctype="">
		<div>
			<label>
				<input type="checkbox" name="declaration" value="Yes" id="declaration">
				I declare that i have been honest.
			</label>
		</div>
		<br>
		<div>
			<a href="index.php" style="text-decoration: none;" class="btn">Back</a>
			<a href="starting_exam.php?id=<?php echo $_REQUEST['id']; ?>" style="text-decoration: none;" class="btn" id="submit">Continue</a>
		</div>
	</form>
</div>

<?php include('footer.php'); ?>

<script type="text/javascript">
	$(function() {
		$("#submit").click(function() {
			if($('#declaration').is(':checked') == false) {
				alert('Please declare before you continue.');
				return false;
			}
		});
	});
</script>