<?php 
include 'sql_details.php';

if (isset($_POST['exp'])) {

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    ini_set('max_execution_time',180);
    ini_set('memory_limit', '1024M');
    $output = fopen('php://output', 'w');

    $con = mysqli_connect($host_name, $user_name, $pass, $db_name);
    $rows = mysqli_query($con, 'SELECT * FROM '.$table_name);

    while ($row = mysqli_fetch_assoc($rows)) {
      fputcsv($output, $row);
    }
    fclose($output);
    mysqli_close($con);
    
    exit();
  }
?>
