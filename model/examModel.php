<?php

/**
 * 
 */
class Exam extends DBConnection {

	private $conn = null;

	public function __construct() {
		$this->conn = parent::connect();
	}

	public function createExam($data) {
		$stmt = $this->conn->prepare("INSERT INTO `exam`(`moduleCode`, `exam_Date`, `StartTime`, `CompletionTime`, `exam_type`, `num_Question`) 
										VALUES (:module_code, :exam_date, :start_time, :end_time, :exam_type, :numOfQuest)  ");
		$response = $stmt->execute([
			':module_code' => $data['module_code'],
			':exam_date' => $data['exam_date'],
			':start_time' => $data['start_time'],
			':end_time' => $data['end_time'],
			':exam_type' => $data['exam_type'],
			':numOfQuest' => $data['number_of_questions'],
		]);
		if($response) {
			return true;
		}
		else {
			return false;
		}
	}

	public function updateExam($data) {
		$stmt = $this->conn->prepare("UPDATE `exam` 
									SET `moduleCode`= :module_code,`exam_Date`= :exam_date,`StartTime`= :start_time,`CompletionTime`= :end_time,`exam_type`= :exam_type,`num_Question`= :numOfQuest 
									WHERE `exam_ID`= :examID");
		$response = $stmt->execute([
			':module_code' => $data['module_code'],
			':exam_date' => $data['exam_date'],
			':start_time' => $data['start_time'],
			':end_time' => $data['end_time'],
			':exam_type' => $data['exam_type'],
			':numOfQuest' => $data['number_of_questions'],
			':examID' => $data['examID'],
		]);
		if($response) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getAllExams() { 
		$stmt = $this->conn->prepare("SELECT * FROM `exam` ORDER BY exam_ID DESC LIMIT 15");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function getExamByCode($moduleCode) { 
		$stmt = $this->conn->prepare("SELECT * FROM `exam` ");
		$stmt->bindValue(1, $moduleCode);
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function getExamInfo($moduleCode) { 
		$stmt = $this->conn->prepare("SELECT * FROM `exam` WHERE moduleCode = ? OR exam_ID = ? ORDER BY exam_ID DESC");
		$stmt->bindValue(1, $moduleCode);
		$stmt->bindValue(2, $moduleCode);
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetch(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function isStudentWrote($studentNumber, $moduleCode) {
		$stmt = $this->conn->prepare("SELECT * FROM `exam_process` WHERE `Student_Number` = ? AND `Module_Code` = ? AND `Declaration` = 'Yes' ");
		$stmt->bindValue(1, $studentNumber);
		$stmt->bindValue(2, $moduleCode);
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function saveExam($data) { 
		$stmt = $this->conn->prepare("INSERT INTO `exam_process`(`Student_Number`, `Module_Code`, `Declaration`, `num_Question`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `Q11`, `Q12`, `Q13`, `Q14`, `Q15`) 
			VALUES (:studentNumber, :moduleCode, :declaration, :totalQuestions, :question1, :question2, :question3, :question4, :question5, :question6, :question7, :question8, :question9, :question10, :question11, :question12, :question13, :question14, :question15) ");
		$results = $stmt->execute([
			':studentNumber' => $data['studentNumber'],
			':moduleCode' => $data['moduleCode'],
			':declaration' => "Yes",
			':totalQuestions' => $data['total_Questions'],
			':question1' => $data['question1'],
			':question2' => $data['question2'],
			':question3' => $data['question3'],
			':question4' => $data['question4'],
			':question5' => $data['question5'],
			':question6' => $data['question6'],
			':question7' => $data['question7'],
			':question8' => $data['question8'],
			':question9' => $data['question9'],
			':question10' => $data['question10'],
			':question11' => $data['question11'],
			':question12' => $data['question12'],
			':question13' => $data['question13'],
			':question14' => $data['question14'],
			':question15' => $data['question15'],
		]);
		if($results) {
			//compile notification message
			$message = array(
				'moduleCode' => $data['moduleCode'],
				'studentNumber' => $data['studentNumber'],
				'message' => "Submitted",
			);
			$this->saveNotification($message); //notify admin about the submission of the exam.
			return true;
		}
		else {
			return false;
		}
	}

	public function saveNotification($data) {
		if(!is_dir('../notifications')) { //check if folder exist
			mkdir('../notifications'); //create folder
		}
		else {
			$ArrayList = array(
			  array(
			  	'timestamp' => date('d-m-Y-H-i-s'), 
			  	'module' => $data['moduleCode'], 
			  	'studentNumber' => $data['studentNumber'], 
			  	'message' => $data['message'],
			  ),
			);

			try {
				$file = fopen("../notifications/messages.csv","a+");
				foreach ($ArrayList as $line) :
				  fputcsv($file, $line);
				endforeach;

				fclose($file);
				return true;
			} 
			catch (Exception $e) {
				echo "<p>".$e->getMessage()."</p>";
				return false;
			}
		}
	}

	public function readNotifications() {
		$parts = array();
		$data = file("../notifications/messages.csv");
		foreach ($data as $items) {
			$parts[] = explode(',', $items);
		}
		return $parts;
	}

	public function getStudentAdmissions($studentNumber) {
		$stmt = $this->conn->prepare("SELECT * FROM `admissions` WHERE Student_Number = ?");
		$stmt->bindValue(1, $studentNumber);
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function getAllAdmissions($moduleCode) {
		$stmt = $this->conn->prepare("SELECT * FROM `admissions` WHERE Module_Code = ?");
		$stmt->bindValue(1, $moduleCode);
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

}

if(class_exists('Exam')) {
	$exam = new Exam();
}

?>