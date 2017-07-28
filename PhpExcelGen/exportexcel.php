<?php 
include 'sql_details.php';
require_once '../Classes/PHPExcel.php';

if (isset($_POST['exp_csv'])) {

$objPHPExcel = new PHPExcel();

$con = mysqli_connect($host_name, $user_name, $pass, $db_name);
$rows = mysqli_query($con, 'SELECT * FROM '.$table_name);
$row_count = mysqli_num_rows($table_name);
echo count($row_count);


  }
?>
