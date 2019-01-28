

// In the following example, markers appear when the user clicks on the map.
// Each marker is labeled with a single alphabetical character.
var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var labelIndex = 0;
var userlocation;
function initialize() {
var hr = new XMLHttpRequest();
    
    hr.open("GET", "http://floodalert.netai.net/floodAlert/getSOSinfo.php", true);
    
    
    hr.onreadystatechange = function() {
	    if(hr.readyState === 4 && hr.status === 200) {
		    var data = JSON.parse(hr.responseText);
                    for(var i=0;i<data.length;i++){
                    userlocation = {lat: parseFloat(data[i].latitude), lng: parseFloat(data[i].longitude)};
                    addMarker(userlocation, map);
                   
                }
                        
	    }
    }
    
    hr.send(null); 


   var kl = {lat:3.1292129,lng:101.649}
   map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: kl
  });

  // This event listener calls addMarker() when the map is clicked.
//  google.maps.event.addListener(map, 'click', function(event) {
//    addMarker(event.latLng, map);
//  });

  // Add a marker at the center of the map.
  
}

// Adds a marker to the map.
function addMarker(location, map) {
  // Add the marker at the clicked location, and add the next-available label
  // from the array of alphabetical characters.
  var marker = new google.maps.Marker({
    position: location,
    label: labels[labelIndex++ % labels.length],
    map: map,
    title: 'Victim'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

