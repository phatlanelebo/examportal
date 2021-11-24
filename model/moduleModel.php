<?php

/**
 * 
 */
class Module extends DBConnection {

	private $conn = null;

	public function __construct() {
		$this->conn = parent::connect();
	}


	public function getAllModules() { 
		$stmt = $this->conn->prepare("SELECT DISTINCT(Module_Code), ID FROM `module` GROUP BY Module_Code ");
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}

	public function getOneModuleInfo($moduleCode) {
		$stmt = $this->conn->prepare("SELECT * FROM `module` WHERE Module_Code = ?");
		$stmt->bindValue(1, $moduleCode);
		$stmt->execute();
		if($stmt->rowCount()) {
			return $stmt->fetch(PDO::FETCH_OBJ);
		}
		else {
			return false;
		}
	}



}

if(class_exists('Module')) {
	$module = new Module();
}

?>