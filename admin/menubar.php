
<style type="text/css">
	.inbox {
		position: absolute;
		margin-left: -3px;
		top: 8px;
		background-color: #9754cb !important;
		color: #fff;
		font-size: .85em;
		border-radius: 50px;
		padding: 2px 6px;
	}
</style>

<nav class="nav">
	<li class="brand"><a href="index.php">Dashboard</a></li>
	<li><a href="exams.php">Exams</a></li>
	<li><a href="modules.php">Modules</a></li>
	<li><a href="messages.php">Message <span class="inbox"><?php echo $messageCount; ?></span></a></li>
	<li><a href="reports.php">Reports</a></li>
	<li><a href="login.php">Logout</a></li>
</nav>