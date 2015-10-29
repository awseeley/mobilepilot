<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/styling.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Move into CSS file -->
  <style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  #map {
    height: 70%;
  }
  </style>

</head>
<body>
  <?php include 'navbar.php';?> <!-- Writes the navbar.php content here -->
  <div class="container mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class ="maptext">
      <body>
        <div id="map"></div>
        <script>
        var map;
        var markers = [];
        var infoWindow;
        var locationSelect;
        //Makes map
        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
          });
        }
       //Searches the locations near a geocode. User can enter address
       function searchLocations() {
         var address = document.getElementById("addressInput").value;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' can\'t be found. Please try again.');
           }
         });
       }
       //Searches the locations near a geocode taken from device location
       function getLocation() {
         if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          alert('Geolocation is not supported by this browser. Please input your address into the other field');
        }
      }

       //Converts Location into Geocoder
      function showPosition() {
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        clearLocations();
        var radius = 25;
        var searchUrl = 'phpsqlsearch_genxml.php?lat=' + lat + '&lng=' + lon + '&radius=' + radius;
        downloadUrl(searchUrl, function(data) {
          var xml = parseXml(data);
          var markerNodes = xml.documentElement.getElementsByTagName("street");
          var bounds = new google.maps.LatLngBounds();
          for (var i = 0; i < markerNodes.length; i++) {
            var address = markerNodes[i].getAttribute("STREET_NAME");
            var distance = parseFloat(markerNodes[i].getAttribute("distance"));
            var latlng = new google.maps.LatLng(
                 parseFloat(markerNodes[i].getAttribute("LATITUDE")),
                 parseFloat(markerNodes[i].getAttribute("LONGITUDE")));

            createOption(name, distance, i);
            createMarker(latlng, name, address);
            bounds.extend(latlng);
          }
          map.fitBounds(bounds);
          locationSelect.style.visibility = "visible";
          locationSelect.onchange = function() {
            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
            google.maps.event.trigger(markers[markerNum], 'click');
          };
         });
      }
       //Resets
       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;

         locationSelect.innerHTML = "";
         var option = document.createElement("option");
         option.value = "none";
         option.innerHTML = "See all results:";
         locationSelect.appendChild(option);
       }
       //Searches closest locations near the store
       function searchLocationsNear(center) {
         clearLocations();

         var radius = document.getElementById('radiusSelect').value;
         var searchUrl = 'phpsqlsearch_genxml.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("street");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {
             var address = markerNodes[i].getAttribute("STREET_NAME");
             var distance = parseFloat(markerNodes[i].getAttribute("distance"));
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("LATITUDE")),
                  parseFloat(markerNodes[i].getAttribute("LONGITUDE")));

             createOption(name, distance, i);
             createMarker(latlng, name, address);
             bounds.extend(latlng);
           }
           map.fitBounds(bounds);
           locationSelect.style.visibility = "visible";
           locationSelect.onchange = function() {
             var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
             google.maps.event.trigger(markers[markerNum], 'click');
           };
          });
        }
        // Puts a marker down on the map
        function createMarker(latlng, name, address) {
          var html = "<b>" + name + "</b> <br/>" + address;
          var marker = new google.maps.Marker({
            map: map,
            position: latlng
          });
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          markers.push(marker);
        }

        function createOption(name, distance, num) {
          var option = document.createElement("option");
          option.value = num;
          option.innerHTML = name + "(" + distance.toFixed(1) + ")";
          locationSelect.appendChild(option);
        }
        //Loads the XML results by passing the lat long to the PHP script and processing the XML
        function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
        }
        // Goes through the XML files and parses them
        function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
        }
        // Doesn't do anything
        function doNothing() {}

        </script>
        <!-- Shows map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHIu1qBijyvkywnowJzNgxDY6Y6JyrP6w&callback=initMap"
        async defer>
        </script>
        <!-- Makes the buttons -->
        <div class="maplinks">
          <p>Click the button below to find your closest store</p>
          <button onclick="getLocation()" class="btn btn-link btn-block">Find closest store automatically</button>
          <p>Alternatively, you may enter your address below to search</p>
          <div>
            <input type="text" class="form-control" id="addressInput" placeholder="Your address" size="10"/>
          </div>
          <button onclick="searchLocations()" class="btn btn-link btn-block">Search close stores</button>
          <div><select id="locationSelect" style="width:100%;visibility:hidden"></select></div>
          <div id="map" style="width: 100%; height: 80%"></div>
        </div>
      </body>
