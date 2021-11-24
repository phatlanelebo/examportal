<?php
session_start();

define('MODEL_PATH', '../model/');

require_once('../config/config.php');
require_once(MODEL_PATH.'studentModel.php');
require_once(MODEL_PATH.'moduleModel.php');
require_once(MODEL_PATH.'examModel.php');

if(isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];

	switch ($action) {
		case 'login':
			$studentNum = htmlentities(trim($_REQUEST['studentNumber']));
			$lastname = htmlentities(trim($_REQUEST['surname']));
			if($student->login($studentNum, $lastname)) {
				header('Location: index.php');
			}
			else {
				include('login.php');
				echo "<div class='alert alert-danger'>Invalid login credentials</div>";
			}
		break;

		case 'submit-exam':
			$data = array(
				'studentNumber' => $_SESSION['studentNum'],
				'moduleCode' => $_REQUEST['moduleCode'],
				'total_Questions' => $_REQUEST['total_Questions'],
				'question1' => isset($_REQUEST['question1']) ? $_REQUEST['question1'] : '-',
			    'question2' => isset($_REQUEST['question2']) ? $_REQUEST['question2'] : '-',
			    'question3' => isset($_REQUEST['question3']) ? $_REQUEST['question3'] : '-',
			    'question4' => isset($_REQUEST['question4']) ? $_REQUEST['question4'] : '-',
			    'question5' => isset($_REQUEST['question5']) ? $_REQUEST['question5'] : '-',
			    'question6' => isset($_REQUEST['question6']) ? $_REQUEST['question6'] : '-',
			    'question7' => isset($_REQUEST['question7']) ? $_REQUEST['question7'] : '-',
			    'question8' => isset($_REQUEST['question8']) ? $_REQUEST['question8'] : '-',
			    'question9' => isset($_REQUEST['question9']) ? $_REQUEST['question9'] : '-',
			    'question10' => isset($_REQUEST['question10']) ? $_REQUEST['question10'] : '-',
			    'question11' => isset($_REQUEST['question11']) ? $_REQUEST['question11'] : '-',
			    'question12' => isset($_REQUEST['question12']) ? $_REQUEST['question12'] : '-',
			    'question13' => isset($_REQUEST['question13']) ? $_REQUEST['question13'] : '-',
			    'question14' => isset($_REQUEST['question14']) ? $_REQUEST['question14'] : '-',
			    'question15' => isset($_REQUEST['question15']) ? $_REQUEST['question15'] : '-',
			);
			if($exam->saveExam($data)) {
				//compile notification message
				// $message = array(
				// 	'moduleCode' => $data['moduleCode'],
				// 	'studentNumber' => $data['studentNumber'],
				// 	'message' => "Submitted",
				// );
				// $exam->saveNotification($message); //notify admin about the submission of the exam.
				header("Location: complete_exam.php");
			}
			else {
				header("Location: starting_exam.php");
			}
			exit();
		break;

		case 'logout':
			if($student->logout()) {
				header("Location: login.php");
				exit();
			}
		break;

		default:
			include('login.php');
		break;

	}

}

?>