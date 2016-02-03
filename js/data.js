
var center= new google.maps.LatLng(47.39261311,8.04689527);

function initialize()
{
var mapProp = {
  center:center,
  zoom:12,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
 


$.getJSON('http://clubfinder.lima-city.de/php/clubs/data.php', function(data){ 
$.each(data, function (i, item) {
		var kordination = item.koordinaten;
		var content = item.content;
		var lng = item.langekor;
		var brt = item.breitekor;
	
	
		var objekt = new google.maps.LatLng(lng,brt);
	
  var marker=new google.maps.Marker({
  position: objekt,
  });

	marker.setMap(map);
	
	 var info = new google.maps.InfoWindow({
  		content:""+content+""
  });
	
	info.open(map,marker);
	
	}); 

});

		  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Du bist hier !');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}
	
google.maps.event.addDomListener(window, 'load', initialize);