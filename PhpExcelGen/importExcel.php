<?php

$value = "No Available Table";


    if(isset($_POST['submit'])){

            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            //echo $_POST["submit"];

            //Upload File

            $tmpfname = "../uploads/{$_FILES["fileToUpload"]["name"]}";
            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
            $excelObj = $excelReader->load($tmpfname);
            $worksheet = $excelObj->getSheet(0);
            $lastRow = $worksheet->getHighestRow();
            $lastCol = $worksheet->getHighestColumn();
            $alphas = range('A', 'Z');

            $colCount = 0;
            $rowCount = $lastRow;
            for($i=0;$i<=sizeof($alphas);$i++){
            if($lastCol == $alphas[$i] ){
                $colCount = $i+1;
                break;
            }
            }
            $table = '';
        
             $table .=  "<table class='table table-striped' id='datatable_import'>";
            
            $table .= '<thead>';
            $table .= '<tr>';
            
            for( $i = 'A'; $i<=$lastCol; $i++ ) {
                 $table .= '<th>'.$i.'</th>';
            }
             $table .= '</tr>';
             $table .= '</thead>';


             $table .= '<tfoot>';
             $table .= '<tr>';
             
             for( $i = 'A'; $i<=$lastCol; $i++ ) {
                  $table .= '<th>'.$i.'</th>';
             }
             $table .= '</tr>';            
             $table .= '</tfoot>';
            


            //create table
            $table .= '<tbody>';
            
            for( $j = 1; $j<=$lastRow; $j++ ) {
                $table .= "<tr>";

                for( $i = 'A'; $i<=$lastCol; $i++ ) {
                    $table .= "<td>";
                    //Read 

                    //Write
                    $table .=  $worksheet->getCell($i.$j.'')->getValue();
                    $table .= "</td>";

                }

                $table .= "</tr>";

            }
            $table .= '</tbody>';

             $table .= "</table>";	
            $table .= "<input type='text' name='rowCount' id='rowCount' style='display:none;' value='".$rowCount."'>";
            $table .= "<input type='text' name='colCount' id='colCount' style='display:none;' value='".$colCount."'>";
            $value =   $table;
    }