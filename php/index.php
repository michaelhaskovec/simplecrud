<?php
session_start(); 
include('./config.php'); 
?>
<?php
if($_SESSION['uid'] == '' && $_SESSION['user'] == '' && $_SESSION['berechtigung'] == '') 
{
	unset($_SESSION['uid']); 
	unset($_SESSION['user']); 
	unset($_SESSION['berechtigung']); 
	header('Location: ../index.html'); 
	exit;
}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bootstrap/table/dist/bootstrap-table.min.css" >
<link rel="stylesheet" type="text/css" href="../bootstrap/select/dist/css/bootstrap-select.min.css" >
<link rel="stylesheet" type="text/css" href="../bootstrap/switch/css/bootstrap-switch.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/JavaScript"></script>
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
<span class="sr-only"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"> <?php echo $user; ?></span></a>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
<ul class="nav navbar-nav navbar-right">
<li><a href ="./clubs/club.php"><span class="glyphicon glyphicon-glass"></span> Clubs verwalten</a></li>
<li><a href ="./passwort/passwort.php"><span class="glyphicon glyphicon-user"></span> Passwort ändern</a></li>
<li><a href ="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
</ul> 
</div>
</div> 
</nav>

    
<div class="container">
  <div class="jumbotron">
    <h1>Willkommen im Backend <?php echo $user; ?> </h1>      
    <p>Hier können Sie neue Clubs eintragen!</p>
  </div>     
</div>



<script src="../bootstrap/switch/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/table/dist/bootstrap-table.min.js"></script>
<script src="../bootstrap/select/dist/js/bootstrap-select.min.js"></script>
</body> 
</html>