<?php
include('../config.php');
if(isset($_POST['mid'])) { 
$mid = $_POST['mid']; 
$geloescht = "DELETE FROM map WHERE mid = ".$mid;
mysql_query($geloescht);
$response_D = mysql_query($geloescht);
}
exit($response_D); 
	
?>