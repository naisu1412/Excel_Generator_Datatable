<?php
require_once '../Classes/PHPExcel.php';


$objPHPExcel = new PHPExcel();
//Cell A1
//Alphabets
$alphas = range('A', 'Z');

//check if colCount and rowCount is a number
$colCount = (is_numeric($_POST['colCount']) ? (int)$_POST['colCount'] : 0);
$rowCount = (is_numeric($_POST['rowCount']) ? (int)$_POST['rowCount'] : 0);
//debugging
 for( $i = 1; $i<=$rowCount; $i++ ) {
         for( $j = 1; $j<=$colCount; $j++ ) {
            $idName = $alphas[$j-1].''.$i ;
           
            $objPHPExcel->getActiveSheet()->setCellValue($idName.'', $_POST[$idName]  . '' );
         }   

     }


   $objPHPExcel->getActiveSheet()->setTitle('Super Ultra Mega Ultimate Project');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="helloworld.xlsx"');
    header('Cache-Control: max-age=0');
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>