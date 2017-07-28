<?php

$db_name = 'demofiles';
$table_name = 'smolteybol';
$host_name = 'localhost';
$user_name = 'root';
$pass = '';

$columnArray = array(
    array( 'db' => 'city', 'dt' => 'city' ),
    array( 'db' => 'loc',  'dt' => 'loc' ),
    array( 'db' => 'pop',   'dt' => 'pop' ),
    array( 'db' => 'state',   'dt' => 'state' ),
    array( 'db' => '_id',     'dt' => '_id' ),
    array( 'db' => 'Content_id',     'dt' => 'Content_id' ),
);

$myvar = " [{ 'data': 'city' },{ 'data': 'loc' },{ 'data': 'pop' },{ 'data': 'state' },{ 'data': '_id' },{ 'data': 'Content_id' },];";

?>