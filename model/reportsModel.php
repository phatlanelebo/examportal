<?php

$ROOT = "../"; //root directory

require_once($ROOT."config/config.php");

class Reports extends DBConnection {

	private $conn = null;

	public function __construct() {
		$this->conn = parent::connect();
	}

	public function report_summ1() {
		$stmt = $this->conn->prepare("SELECT
						COUNT(exam_ID) 'TOTAL_COUNT',
						DAYNAME(exam_Date) 'SUBMIT_DAY'
						FROM `exam`
						WHERE NULLIF(exam_Date,' ') IS NOT NULL
						GROUP BY SUBMIT_DAY");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function report_summ2() {
		$stmt = $this->conn->prepare("SELECT
								COUNT(exam_ID) 'TOTAL_COUNT',
								moduleCode 'MODULES',
								DAYNAME(exam_Date) 'DAYS'
								FROM `exam`
								WHERE NULLIF(exam_Date,' ') IS NOT NULL
								GROUP BY DAYS
								HAVING TOTAL_COUNT >= 1");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function report_trends1() {
		$stmt = $this->conn->prepare("SELECT COUNT(moduleCode) AS 'TOTAL_MODULES',
									WEEKDAY(exam_Date)+1 AS 'PER_WEEK'
									FROM `exam`
									WHERE exam_Date <> ''
									GROUP BY PER_WEEK");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function report_trends2() {
		$stmt = $this->conn->prepare("SELECT COUNT(moduleCode) 'TOTAL_COUNT',
									WEEKDAY(exam_Date) AS 'WEEKS_NUMBER'
									FROM `exam`
									WHERE exam_Date <> ''
									GROUP BY WEEKS_NUMBER
									HAVING TOTAL_COUNT > 1");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function report_trends3() {
		$stmt = $this->conn->prepare("SELECT exam_type AS 'TypeOfExam', StartTime AS 'EVENING_TIMES'
									FROM `exam`
									WHERE exam_type = 'MCQ' 
									AND extract(hour from StartTime) in ('18','22')
									GROUP BY EVENING_TIMES
									ORDER BY EVENING_TIMES ASC LIMIT 10");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function rpt_exception1() {
		$stmt = $this->conn->prepare("SELECT COUNT(exam_ID) 'TOTAL_RECORDS',
										exam_Date 'EXAM_DATES'
										FROM `exam`
										WHERE NULLIF(exam_Date,' ') IS NULL");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function rpt_exception2() {
		$stmt = $this->conn->prepare("SELECT COUNT(exam_ID) AS 'TOTAL_COUNT',
										moduleCode AS 'MODULES'
										FROM `exam`
										GROUP BY moduleCode
										HAVING COUNT(moduleCode) > 1 LIMIT 10");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function rpt_predictive() {
		$stmt = $this->conn->prepare("SELECT COUNT(exam_ID) 'TOTAL_COUNT',
									MONTHNAME(exam_Date) 'EXAMS_SUBMISSIONS'
									FROM `exam`
									WHERE NULLIF(exam_Date, '') IS NOT NULL
									GROUP BY EXAMS_SUBMISSIONS
									ORDER BY EXAMS_SUBMISSIONS");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

}


?>