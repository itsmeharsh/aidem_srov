<?php

//error_reporting(E_ALL);
ini_set('display_errors',true);
ini_set('max_execution_time','-1');

$servername = "localhost";
$username = "vrosmedia";
$password = "vrosmedia@123";
$db_name = "vrosmedia";

global $db;
// Create connection
$db = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

function update_query($field_ary) {
    $count = 0;
    $fields = '';

    foreach($field_ary as $col => $val) {
        if ($count++ != 0) $fields .= ', ';
        $col = $col;
        $val = $val;
        $fields .= '`$col` = "'.$val.'"';
    }

    return $fields;
}

?>


  