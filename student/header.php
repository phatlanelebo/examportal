<?php
session_start();

$ROOT = $_SERVER['DOCUMENT_ROOT']."/"."project_lebo/";

require_once($ROOT."config/config.php");

require_once($ROOT."/model/reportsModel.php");
require_once($ROOT."/model/moduleModel.php");
require_once($ROOT."/model/examModel.php");

$exam = new Exam();
$module = new Module();

?>

<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/styles.css">
<link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">