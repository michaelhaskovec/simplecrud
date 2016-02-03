<?php
include('../config.php');
if(isset($_POST['content']) && isset($_POST['langekor']) && isset($_POST['breitekor'])){ 
	$content = $_POST['content']; 
	$langekor = $_POST['langekor']; 
	$breitekor = $_POST['breitekor'];

$add = mysql_query("INSERT INTO map (content, langekor, breitekor) VALUES ('$content', '$langekor', '$breitekor')"); 
	
$response_I = mysql_query($add);


}
exit($response_I);
?>