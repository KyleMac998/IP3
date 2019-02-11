<!DOCTYPE html>
<!-- Fetching and processing data and using this with Google Maps
     Data feed URLs can be found on following page: https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php
     Author: Peter Barrie
     Date: 7 August 2018
Specifically:
     Click button to populate map with earthquake markers from a specific USGS data feed.
     Markers are labelled to show the magnitude of the earthquake.
-->
<html>

<head>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>

  meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">IP3</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="EQ.php">Earthquake Map</a></li>
    </ul>
  </div>
</nav>

<style>
    /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */

    #map {
        height: 70%;
        width: 70%;
        position:inherit
    }

    /* Optional settings. Do as you wish with these*/

    html,
    body {
        height: 96%;
        margin: 1%;
        padding: 0;
    }

    #other {
        height: auto;
        width: 50%;
    }
</style>
<!--We will use JQuery library (https://jquery.com/) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<div id="other">
    <header>
        <h1>Earthquake Mapping</h1>
        <h3>Integrated Project 2 Starter</h3>
        <h4>Google map with earthquake markers</h4>
        <h4> Data from following source:
            <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson">https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson</a>
        </h4>
        <h4>See all feeds at:
            <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php">https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php</a>
        </h4>
        <button type="button" class="btn btn-default" id="earthquakes">Show Earthquake</button>
        <button type="button" class="btn btn-default" id="earthquake-cluster">Cluster</button>
    </header>

    <!-- 'info' is just for debugging use -->
    <div id="info"></div>
        </div>
        <div id="map"></div>
        <script>
            var map;
            //initMap() called when Google Maps API code is loaded - when web page is opened/refreshed
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 2,
                    center: new google.maps.LatLng(2.8, -187.3), // Center Map. Set this to any location that you like
                    mapTypeId: 'terrain' // can be any valid type
                });
            }

            var thelocation;
            var titleName;
            $(document).ready(function () {

                $('#earthquakes').click(function () {
                    // Set Google map  to its start state
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 2,
                        center: new google.maps.LatLng(2.8, -187.3), // Center Map. Set this to any location that you like
                        mapTypeId: 'terrain' // can be any valid type
                    });
                    $.ajax({
                        // The URL of the specific data required
                        url: "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson",

                        // Called if there is a problem loading the data
                        error: function () {
                            $('#info').html('<p>An error has occurred</p>');
                        },

                        // The data has succesfully loaded
                        success: function (data) {
                            $.each(data.features, function (key, val) {
                                // Get the lat and lng data for use in the markers
                                var coords = val.geometry.coordinates;
                                var latLng = new google.maps.LatLng(coords[1], coords[0]);
                                // Now create a new marker on the map
                                var marker = new google.maps.Marker({
                                    position: latLng,
                                    map: map,
                                    label: val.properties.mag.toString() // Whatever label you like. This one is the magnitude of the earthquake
                                });
                                // Form a string that holds desired marker infoWindow content. The infoWindow will pop up when you click on a marker on the map
                                var infowindow = new google.maps.InfoWindow({
                                    content: "<h3>" + val.properties.title + "</h3><p><a href='" + val.properties.url + "'>Details</a></p>"
                                });
                                marker.addListener('click', function (data) {
                                    infowindow.open(map, marker); // Open the Google maps marker infoWindow
                                });
                            });

                        }
                    });
                });
            });

    var thelocation;
        var titleName;
        $(document).ready(function () {

            //shows cluster
            $('#earthquake-cluster').click(function () {
                // Set Google map  to its start state
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 2,
                    center: new google.maps.LatLng(2.8, -187.3), // Center Map. Set this to any location that you like
                    mapTypeId: 'terrain' // can be any valid type
                });
                // The following uses JQuery library
                $.ajax({
                    // The URL of the specific data required
                    url: "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojson",

                    // Called if there is a problem loading the data
                    error: function () {
                        $('#info').html('<p>An error has occurred</p>');
                    },
                    // Called when the data has succesfully loaded
                    success: function (data) {
                        i = 0;
                        var markers = []; // keep an array of Google Maps markers, to be used by the Google Maps clusterer
                        $.each(data.features, function (key, val) {
                            // Get the lat and lng data for use in the markers
                            var coords = val.geometry.coordinates;
                            var latLng = new google.maps.LatLng(coords[1], coords[0]);
                            // Now create a new marker on the map
                            var marker = new google.maps.Marker({
                                position: latLng,
                                map: map
                            });
                            markers[i++] = marker; // Add the marker to array to be used by clusterer
                        });
                        var markerCluster = new MarkerClusterer(map, markers,
                            { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });
                    }
                });
            });
        });


</script>

<!-- Need the following code for Google Maps. PLEASE INSERT YOUR OWN GOOGLE MAPS KEY BELOW -->
<!-- Need the following code for clustering Google maps markers-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <!-- Need the following code for Google Maps. PLEASE INSERT YOUR OWN GOOGLE MAPS KEY BELOW -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYDa0yOFJwOkLdW7fcpmXHtWDyXSZEHyI&callback=initMap">
    </script>
</body>



</html>
