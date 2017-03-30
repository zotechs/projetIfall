    <script type="text/javascript">

document.onload=initialize;

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(initMap);
    } else {
       console.log('Geolocation is not supported by this browser.');
    }
}
function showPosition(position) {
    console.log('Latitude: '+ getlat(position) + 
    '  Longitude: ' + getlog(position)); 
}
getLocation();

function getlat(position)
{
  return  position.coords.latitude;
}
function getlog(position)
{
  return  position.coords.longitude;
}


var map;

function initMap(position) {

  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: getlat(position), lng: getlog(position)},
    zoom: 10
  });



   marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: getlat(position), lng: getlog(position)}
  });
  marker.addListener('click', toggleBounce);
}

function toggleBounce() {
  console.log(marker.position.lat);
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}


var geocoder;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(14.6937000, -17.4440600);
    var mapOptions = {
      zoom: 10,
      center: latlng
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
  }

  function codeAddress() {
    var selectElmt=document.getElementById("address");
    var address =  selectElmt.options[selectElmt.selectedIndex].value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }



    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVzvRPvu4G0PhG9qHqZcMSuTYk4pMSVQ"
    async defer></script>
   