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
	header('Location: ../../index.html'); 
	exit;
}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=no">
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/table/dist/bootstrap-table.min.css">
<style type="text/css"> 
	.circular {
		background-position:top; 
		background-size:cover;
		border-radius: 150px;
		-webkit-border-radius: 150px; 
		-moz-border-radius: 150px;
		height: 200px; 
		width: 200px;
} 
	.Xvisible {
		display:none; 
	}
.green { 
		color:green;
} 
	.glyphicon-ok:hover {
		color:green !important; 
	}
.glyphicon-ok:focus{
	color:green !important;
}

.hide { display:none;
}
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
<li><a href ="../index.php"><span class="glyphicon glyphicon-home"></span> Backend</a></li>
<li><a href ="../passwort/passwort.php"><span class="glyphicon glyphicon-user"></span> Passwort ändern</a></li>
<li><a href ="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
</ul> 
</div>
</div> 
</nav>

    
<div class="container">
  <div class="jumbotron">
    <h1>Clubs verwalten</h1>      
	  <p><a href="http://www.mapcoordinates.net/">Koordinaten Karte</a></p>
<table class="table table-responsive" data-toggle="table" data-url="http://clubfinder.lima-city.de/php/clubs/data.php" data-pagination="true" data-search="true" data-show-toggle="true" data-show-refresh="true">
<thead>
<tr>
<th data-field="mid" data-sortable="true">ID</th>
<th data-field="content" data-sortable="true">Inhalt</th>
<th data-field="langekor">Koordinate X</th>
<th data-field="breitekor" data-formatter="berechtigungen">Koordinate Y</th>
<th data-field="manage" data-formatter="operateFormatter" data-events="operateEvents">Bearbeiten</th> 
</tr>
</thead>
<tfoot>
￼<tr>
<td></td>
<td><input class="form-control" name="content" id="content"></td> 
<td><input class="form-control" name="langekor" id="langekor"></td> 
<td><input class="form-control" name="breitekor" id="breitekor"></td> 
<td><a id="insert" href="javascript:void(0)" title="Einfügen"><span class="glyphicon glyphicon-plus"></span></a></td>
</tr>
</tfoot>
</table>
	
    <div id="googleMap" style="width:100%;height:500px;"></div>
	 
	 
  </div>     
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="../../js/data.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../bootstrap/table/dist/bootstrap-table.min.js"></script>
<script>
$("#insert").click(function(){
	
var content= $("#content").val(); 
var langekor= $("#langekor").val(); 
var breitekor= $("#breitekor").val(); 
	
$.ajax({
type: "POST", 
url: "club_insert.php",
data: "content="+content+"&langekor="+langekor+"&breitekor="+breitekor,
success: function(response_I){

$('#table > tbody:last').append('<tr><td></td><td>'+content+'</td><td>'+langekor+'</td><td>'+breitekor+'</td><td><a class="edit ml10" href="javascript:void(0)" title="Bearbeiten"><i class="glyphicon glyphicon-edit">&nbsp; </i></a><a class="sure ml10" href="javascript:void(0)" title="Sure"><i class="glyphicon glyphicon-ok">&nbsp; </i></a><a class="remove ml10" href="javascript:void(0)" title="Löschen"><i class="glyphicon glyphicon-remove Xvisible" style="color:red"></i></a></td></tr>');
location.reload();
}	
}); 
});
</script> 
<script>
function operateFormatter(value, row, index) { 
	return [
'<a class="edit ml10" href="javascript:void(0)" title="Bearbeiten">', '<i class="glyphicon glyphicon-edit">&nbsp; </i>',
'</a>',
'<a class="sure ml10" href="javascript:void(0)" title="Sure">', '<i class="glyphicon glyphicon-ok">&nbsp; </i>',
'</a>',
'<a class="remove ml10" href="javascript:void(0)" title="Löschen">',
'<i class="glyphicon glyphicon-remove Xvisible" style="color:red"></i>',
'</a>' ].join('');
}	
$(document).ready(function() {
window.operateEvents = {
'click .edit': function (e, value, row, index) { 
var mid = parseInt(row.mid); 
	
	document.location.href='./club_edit.php?mid=' + mid
	
},
'click .sure': function (e, value, row, index) {
$(this).toggleClass("green");
	$(".glyphicon-remove").eq(index).toggleClass("Xvisible");
},
'click .remove': function (e, value, row, index) {
var mid = JSON.stringify(row.mid);
$.ajax({
type: "POST", 
url: "club_delete.php", 
data: 'mid=' + mid, 
success: function(response_D){
$('tr').remove(":contains("+mid+")");
location.reload();
} 
});
}
}


});
</script>



</body> 
</html>