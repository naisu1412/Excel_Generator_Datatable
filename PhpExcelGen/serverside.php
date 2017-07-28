<?php
include 'sql_details.php';
// DB table to use
$table = $table_name; //58K entries
 
// Table's primary key
$primaryKey = 'Content_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = $columnArray;
 
// SQL server connection information
$sql_details = array(
    'user' => $user_name,
    'pass' => $pass,
    'db'   => $db_name,
    'host' => $host_name
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'scripts/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);