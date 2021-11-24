<?php

	//database configuration script
	abstract class DBConnection {
		const DB_HOST = "localhost";
		const DB_USER = "webusers";
		const DB_PASSWORD = "edecobode";
		const DB_NAME = "61691534_ict3715";
		private $conn = null;


		private function db_init() {
			try {
				$this->conn = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASSWORD);
			}
			catch(PDOException $e) {
				echo "DATABSE ERROR: ". $e->getMessage();
			}
			return $this->conn;
		}

		public function connect() {
			return $this->db_init();
		}
	}

?>