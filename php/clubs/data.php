<?php
header('Content-type: application/json');
include('../config.php');
$data = array();
$query = mysql_query("SELECT * FROM map");

while($obj = mysql_fetch_object($query)) {
$data[] = $obj;
}

echo json_encode($data);

?>