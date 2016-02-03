<?php
include('../config.php');

$mid = $_GET['mid'];

$query = mysql_query("SELECT * FROM map WHERE mid = '$mid'");
$row = mysql_fetch_array($query);

$content = $row['content'];
$langekor = $row['langekor'];
$breitekor = $row['breitekor'];
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>edit</title>
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/table/src/bootstrap-table.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/switch/css/bootstrap-switch.min.css">
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<style>
#bearbeiten_button{
background:#5cb85c;
border-color:#5cb85c;
color:white;
}
#bearbeiten_button:hover{
background:green;
border-color:green;
color:white;
}
    
        .green {
    color:green;
}
            .passwordreset
                  {
    color:red;
}
.glyphicon-ok:hover {
 color:green !important;
}
.glyphicon-ok:focus{
 color:green !important;
}
</style>
</head>
<body>
<div class="container"> 
<h1 class="center-block" id="titel" style="text-align:center"> Club bearbeiten</h1>
<form action="" method="POST">
	<table class="table table-hover" border="1px;">
<tr><td>Inhalt: </td><td><input type="text" name="content" value="<?php echo $content; ?>"></td></tr>
<tr><td>Koordinate X: </td><td><input name="langekor" value="<?php echo $langekor; ?>"></td></tr>
<tr><td>Koordinate Y: </td><td><input name="breitekor" value="<?php echo $breitekor; ?>"></td></tr>

</table>
<div class="row">
<div class="col-md-12"><input class="btn btn-primary" id="button" type="submit" value="Bearbeiten" name="edit"> <a href="http://clubfinder.lima-city.de/php/clubs/club.php">
<input class="btn btn-primary" id="button1" type="button" class='cancel' value="Abbrechen" style="float:right" /></a></div><!-- Abbrechen und Zurück auf Verwaltungsseite -->
</form>
</div>
</body>
</html> 
<?php
if(isset($_POST["edit"])){ 
$mid = $_GET['mid'];
$content = $_POST['content'];
$langekor = $_POST['langekor'];
$breitekor = $_POST['breitekor'];
	
$query = "UPDATE map
		  SET
		  content='$content', 
		  langekor='$langekor', 
		  breitekor='$breitekor'
		  WHERE
		  mid = $mid";
	
mysql_query($query)or die(mysql_error());
	echo "<meta http-equiv=refresh content=\"0; URL=http://clubfinder.lima-city.de/php/clubs/club.php\">"; 
	}
exit;
?>





