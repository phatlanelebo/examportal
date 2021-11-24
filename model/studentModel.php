<?php

	class Student extends DBConnection {

		private $conn = null;

		public function __construct() {
			$this->conn = parent::connect();
		}

		public function login($studentNumber, $lastname) {
			$stmt = $this->conn->prepare("SELECT * FROM `student` WHERE Student_Number = ? AND Student_Surname = ?");
			$stmt->bindValue(1, $studentNumber);
			$stmt->bindValue(2, $lastname);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$data = $stmt->fetch(PDO::FETCH_OBJ);
				return $_SESSION['studentNum'] = $data->Student_Number;
			}
			else {
				return false;
			}
		}

		public function logout() {
			unset($_SESSION['studentNum']);
			return true;
		}

		public function getStudentInformation($studentNumber) {
			$stmt = $this->conn->prepare("SELECT * FROM `student` WHERE Student_Number = ? ");
			$stmt->bindValue(1, $studentNumber);
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				return $stmt->fetch(PDO::FETCH_OBJ);
			}
			else {
				return false;
			}
		}

	}

	if(class_exists('Student')) {
		$student = new Student();
	}

?>