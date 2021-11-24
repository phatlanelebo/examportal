<?php
session_start();

define('MODEL_PATH', '../model/');

require_once('../config/config.php');
require_once(MODEL_PATH.'adminModel.php');
require_once(MODEL_PATH.'moduleModel.php');
require_once(MODEL_PATH.'examModel.php');
require_once(MODEL_PATH.'studentModel.php');

if(isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];

	switch ($action) {
		case 'admin-login':
			$email = htmlentities(trim($_REQUEST['email']));
			$password = htmlentities(trim($_REQUEST['password']));
			if(empty($email) && empty($password)) {
				include('login.php');
				echo "<div class='alert alert-danger'>Please type your email and password</div>";
				exit();
			}
			if($admin->login($email, $password)) {
				include('index.php');
			}
			else {
				echo "<div class='alert alert-danger'>Invalid login credentials</div>";
				include('login.php');
			}

		break;

		case 'logout':
			if($admin->logout()) {
				include('login.php');
				exit();
			}
		break;

		case 'create-exam':
			if(!is_dir('../exam_paper')) {
				mkdir('../exam_paper');
			}
			if(!in_array('', $_REQUEST)) {
				//filename
				$filename = $_FILES['question_paper']['name'];
				//file extension
				$file_ext = explode('.', $filename);
				//create new filename
				$filename = $_REQUEST['module_code'].'_'.$_REQUEST['exam_date'].'.'.$file_ext[1];
				//specify folder to upload
				$upload_Folder = "../exam_paper/".$filename;
				//creating/adding new exam to database
				if($exam->createExam($_REQUEST)) {
					//uploading the file to the server
					if(move_uploaded_file($_FILES['question_paper']['tmp_name'], $upload_Folder)) {
						echo "<div class='alert alert-success'>Exam has been saved successfully.</div>";
						include('exams.php');
					}
					else {
						echo "<div class='alert alert-danger'>Failed to upload exam file.</div>";
					}
				}
				else {
					include('createexam.php');
					echo "<div class='alert alert-danger'>Failed to save exam.</div>";
				}
			}
			else {
				include('createexam.php');
				echo "<div class='alert alert-danger'>Please type and select all required data.</div>";
			}
		break;

		case 'update-exam':
			if(!in_array('', $_REQUEST)) {
				//filename
				$filename = $_FILES['question_paper']['name'];
				//file extension
				$file_ext = explode('.', $filename);
				//create new filename
				$filename = $_REQUEST['module_code'].'_'.$_REQUEST['exam_date'].'.'.$file_ext[1];
				//specify folder to upload
				$upload_Folder = "../exam_paper/".$filename;

				if($exam->updateExam($_REQUEST)) {
					//uploading the file to the server
					if(move_uploaded_file($_FILES['question_paper']['tmp_name'], $upload_Folder)) {
						echo "<div class='alert alert-success'>Exam has been updated successfully.</div>";
						include('exams.php');
					}
					else {
						echo "<div class='alert alert-danger'>Failed to update exam file.</div>";
					}
				}
				else {
					include('createexam.php');
					echo "<div class='alert alert-danger'>Failed to update exam.</div>";
				}
			}
			else {
				include('createexam.php');
				echo "<div class='alert alert-danger'>Please type and select all required data.</div>";
			}
		break;

		
		default:
			# code...
			break;
	}

}

?>