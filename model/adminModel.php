<?php

	class Admin extends DBConnection {

		private $conn = null;

		public function __construct() {
			$this->conn = parent::connect();
		}

		public function login($email, $password) {
			$stmt = $this->conn->prepare("SELECT * FROM `admin` WHERE `email` = ? AND `admin` = ?");
			$stmt->bindValue(1, $email);
			$stmt->bindValue(2, $this->encrypt_data($password));
			$stmt->execute();
			if($stmt->rowCount() > 0) {
				$data = $stmt->fetch(PDO::FETCH_OBJ);
				$_SESSION['admin'] = $this->encrypt_data($data->email);
				return true;
			}
			else {
				return false;
			}
		}

		public function logout() {
			unset($_SESSION['admin']);
			return true;
		}

		public function encrypt_data($data) {
			return sha1($data);
		}

	}

	if(class_exists('Admin')) {
		$admin = new Admin();
	}

?>