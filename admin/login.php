<?php
//login page
/*if(!isset($_POST['loginType'])) {
	echo "Please select correct login";
	exit();
}*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">

	<style type="text/css">
		body {
			font-family: arial, 'helvertica';
		}
		.container {
			width: 550px;
			max-width: 100%;
			margin: 0 auto;
			background-color: #fff;
			color: #777;
			border-radius: 2px;
			/*padding: 5px 10px;*/
			box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
			margin-top: 100px;
			box-sizing: border-box;

		}
		.header {
			text-align: center;
			font-size: 2em;
			margin: 20px 0;
			border-bottom: thin solid #eee;
		}
		.heading {
			font-size: 1.5em;
			font-weight: bold;
			color: #777;
			background-color: #eee;
			text-align: center;
			padding: 8px 0;
			margin: -6px -10px 20px -10px;
			border-radius: 5px 5px 0 0;

		}
		.controls {
			width: 95%;
			border: none;
			border-bottom: thin solid #ddd;
			outline: none;
			/*border-radius: 5px;*/
			padding: 15px 0;
			margin: 10px 0;
			text-indent: 30px;
			color: #777;
			
		}
		.controls:focus {
			border-color: #B39DDB !important;
		}
		.btn {
			width: 120px;
			background-color: #B39DDB;
			color: #fff;
			border: thin solid #B39DDB;
			padding: 10px;
			border-radius: 50px;
			margin: 10px 10px;
			margin-bottom: 20px;
			cursor: pointer;
			font-weight: bold;
		}
		.btn:hover {
			background-color: #D1C4E9;
		}
		.row {
			display: -webkit-flex;
			display: flex;
		}
		.column {
			flex: 33.33%;
		}
		.column:first-child {
			flex: 20%;
			margin-right: 10px;
			background-color: #ccc;
		}
		form {
			transform: translate(0, 10%);
		}
		.links {
			color: #5d7599;
			margin-top: 10px;
		}
		.links > a {
			text-decoration: none;
			color: #673ab7;
		}
		.links > a:hover {
			text-decoration: underline;
		}
		.side-image {
			width: 100%;
			height: 350px;
			margin-bottom: -4px;
			border-radius: 2px 0 0 2px;
		}
		.lead {
			font-size: 1.3em;
			font-weight: bold;
			color: #B39DDB;
			text-align: center;
			margin-top: 40px;
		}
		.input-icon {
			position: absolute;
			left: 0px;
			font-size: 1.5em;
			color: #B39DDB;
			margin-top: 20px;
		}
		.btn.btn-alt {
			position: absolute;
			margin: 150px 0 0 -180px;
			background-color: transparent;
			border: thin solid #fff;
		}
		.btn.btn-alt:hover {
			background-color: #fff;
			color: #B39DDB;
			transition: 1s;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="column">
				<img src="../assets/pexels-photo.jpeg" class="side-image">
				<button type="button" class="btn btn-alt" onclick="redirect('../student/login.php')">Student</button>
			</div>

			<div class="column">
				<div class="lead"><i class="fa fa-user"></i> ADMIN LOGIN</div>
				<form action="controller.php" method="POST" enctype="application/x-www-forms-urlenconded">
					<div>
						<i class="fa fa-envelope input-icon"></i>
						<input type="email" class="controls" name="email" placeholder="Enter email">
					</div>
					<div>
						<i class="fa fa-unlock input-icon"></i>
						<input type="password" class="controls" name="password" placeholder="Enter password">
					</div>
					<div align="right">
						<button type="submit" class="btn" name="action" value="admin-login">Login</button>
					</div>
					<div class="links" align="center">
						Not registered yet?<br>
						<a href="../">&larr; <i class="fa fa-home"></i> Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		function redirect(url) {
			window.open(url, '_self');
		}
	</script>

</body>
</html>