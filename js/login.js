$(document).ready(function() {

	$(".button").click(function(){ 
		
		var username = $("#username").val(); 
		var password = $("#password").val(); 
		
		$.ajax({ 
			type: "POST", 
			url: "./php/login.php", 
			data: "username="+username+"&password="+password, 
			success: function(response_L){ 
				switch (response_L) {
					case "1":
						window.location="./php/index.php";
						break;
					case "2":// Redirect für Super-User, Session Variabel wurde im PHP gesetzt
						window.location="./php/index.php";
						break;
					default:
						$(".error").slideDown("slow").html("<br><b><span style='color:red'>"+response_L+"</span></b>");
				}
			}
		});
		
	}); 
});