<?php
session_start(); 
include('./config.php'); 
$username = mysql_real_escape_string($_POST['username']); 
$passwort = mysql_real_escape_string($_POST['password']);

if($username != '' && $passwort != ''){
$query_validierung = mysql_query("SELECT * FROM user WHERE username = '$username'");
$verfuegbar = mysql_num_rows($query_validierung);

$zeile = mysql_fetch_array($query_validierung);
$sqlpasswort = $zeile['password']; 
$sqlberechtigung = $zeile['berechtigung']; 
	
if($verfuegbar == 1){ 
if(md5($passwort) == $sqlpasswort){ 


	switch($sqlberechtigung)
	{
	
		case "Admin":
		$_SESSION['uid'] = $sqluid; 
		$_SESSION['user'] = $username; 
		$_SESSION['berechtigung'] = "Admin"; 
		$response_L = "1";
		break;

	default:
		echo "Unauthorisiert";
	}	
	
}

	else {
$response_L = "Passwort oder Username falsch";
}
	
} 
	else {
$response_L = "Passwort oder Username falsch";
}
	
}

exit($response_L); 
?>
