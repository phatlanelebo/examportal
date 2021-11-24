<?php
  //index landing page
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME::Online Exam Portal</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">

	<style type="text/css">
		body {
			font-family: arial, 'helvertica';
		}
		.container {
			width: 600px;
			height: 350px;
			max-width: 100%;
			margin: 50px auto;
			background-color: #f9f9f9;
			border-radius: 5px;
			padding: 5px 10px;
			text-align: center;
			box-shadow: 1px 2px 4px rgba(0,0,0,0.5);
		}
		.header {
			text-align: center;
			font-size: 2em;
			margin: 20px 0;
			border-bottom: thin solid #eee;
			color: #B39DDB;
		}
		.controls {
			width: 100%;
			border: thin solid #777;
			border-radius: 5px;
			padding: 10px 0;
			margin: 5px 0;
			text-indent: 5px;
		}
		.btn {
			width: 100px;
			background-color: #eee;
			color: #777;
			border: thin solid #bbb;
			padding: 10px;
			border-radius: 5px;
			margin: 10px 0;
			cursor: pointer;
			font-weight: bold;
		}

		/*************************/

		html {
			box-sizing: border-box;
		}

		*,*::before, *::after {
			padding: 0;
			margin: 0;
			box-sizing: inherit;
		}

		.container-item {
			width: 90vh;
			height: 40vh;
			display: flex;
			margin: 0 auto;
			padding: 40px 0;
			/*background-color: #ccc;*/
		}

		input[type="radio"] {
			-webkit-appearance:none;
			-moz-appearance:none;
			appearance:none;
		}
		label {
			width: 180px;
			height: 150px; /*180*/
			border: 2px solid #D1C4E9; /*#b3a5ef;*/
			color: #D1C4E9;
			border-radius: 40px;
			position: relative;
			margin: 0 auto;
			transition: 0.5s;
		}
		.icon {
			font-size: 80px;
			position: absolute;
			top: 10%;
			left: 25%;
			transition: translate(-50%, -80%);
		}
		.fa-user.icon {
			left: 34%;
		}
		label > span {
			font-size: 25px;
			position: absolute;
			top: 70%;
			left: 25%;
			transition: translate(-50%, -80%);
			font-family: "arial", helvertica;
			font-weight: bold;
			
		}
		input[type="radio"]:checked + label {
			background-color: #b3a5ef;
			color: #fff;
			box-shadow: 0 15px 45px rgba(24, 249, 141, 0.2);
		}
		label:hover {
			color: #b3a5ef;
			border-color: #b3a5ef;
			cursor: pointer;
		}
		.lead {
			font-size: 1.5em;
			color: #b3a5ef;
			font-weight: bold;
			margin-top: 20px;
		}

		.btn {
			position: relative;
			border: thin solid #b3a5ef;
			border-radius: 50px;
			padding: 10px;
			font-weight: bold;
			color: #fff;
			background-color: #B39DDB;/*#7E57C2;*/
			margin-top: -50px;
		}
		.btn:hover {
			background-color: #b3a5ef;
		}
		.btn:hover {
			background-color: #7E57C2;
		}
	
	</style>
</head>
<body>

	<div class="header">Online Exam Portal</div>

	<div class="container">
		<div class="lead">Select login type</div>
		<form action="admin/login.php" method="POST" enctype="">
			<div class="container-item">

				<input type="radio" name="loginType" value="student" id="student">
				<label for="student">
					<i class="fa fa-user icon" aria-hidden="true"></i>
					<span class="">Student</span>
				</label>

				<input type="radio" name="loginType" value="admin" id="admin">
				<label for="admin">
					<i class="fa fa-users icon" aria-hidden="true"></i>
					<span class="">Admin</span>
				</label>
			</div>
			<div>
				<!-- <button type="button" class="btn" name="submit" onclick="redirect('index.php')"><i class="fa fa-home"></i> Home</button> -->
				<button type="button" class="btn" name="submit" onclick="openLogin()">Continue <i class="fa fa-arrow-right"></i></button>
			</div>
		</form>
	</div>

</body>

	<script type="text/javascript">
		function openLogin() {
			let path = document.forms[0].loginType.value;
			let url = null;
			if(path=='student') {
				url = 'student/login.php';
			}
			else {
				url = 'admin/login.php';
			}
			redirect(url);
		}
		function redirect(url) {
			window.open(url, '_self');
		}
	</script>

</html>