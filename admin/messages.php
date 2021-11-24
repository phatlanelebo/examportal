
<?php

include('header.php');
include('menubar.php');

$modules = $module->getAllModules();

?>

<style type="text/css">
	.msg-box {
		width: 500px;
		border: thin solid #777;
		border-radius: 5px;
		margin: 0 auto;
		padding: 10px 5px;
	}
	h4 {
		text-align: center;
		border-bottom: thin solid #ccc;
		color: #777;
	}
	.msg-container {
		height: 300px;
		max-height: 300px;
		overflow: auto;
		color: #397D54; /*#6237A0;*/
		font-weight: bold;
	}
	.message {
		padding: 10px;
		border-radius: 5px;
		background-color: #C8EAD1; /*#DEACF5;*/
		margin-bottom: 8px;
	}
	.close {
		float: right;
	}
</style>

<h3 class="page-header">Alert Messages</h3>

<div class="" style="width: 85%; margin: 0 auto; ">
	<div class="msg-box">
		<h4><i class="fa fa-bell"></i> Notificaction Messages</h4>
		<div class="msg-container">
			<?php if($messages != false) { ?>
			<?php foreach($messages as $message): ?>
			<div class="message">
				<small>
					<?php echo date('d/M/y \- H:i A', strtotime($message[0])); ?></small> - 
					<?php echo $message[1]; ?> - Student: 
					<?php echo $message[2]; ?> has 
					<?php echo $message[3]; ?> 
				<span class="close">&times;</span>
			</div>
			<?php endforeach; ?>
			<?php } else { ?>
				<div class="message"><center><i class="fa fa-info-circle"></i> Notifications not availale at the moment.</center></div>
			<?php } ?>
		</div>
	</div>
</div>