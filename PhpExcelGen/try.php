<?php
$rowCount = (is_numeric($_POST['rowCount']) ? (int)$_POST['rowCount'] : 0);
$var = "A";
echo $var++;
$alphas = range('A', 'Z');
for( $i = 0; $i < $rowCount; $i++ ) {
         echo  $_POST[$alphas[$i].'1'];
         }
?>