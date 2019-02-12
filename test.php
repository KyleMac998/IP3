<!DOCTYPE html>
<!-- Fetching and processing data and using this with Google Maps
     Data feed URLs can be found on following page: https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php
     Author: Peter Barrie
     Date: 7 August 2018
Specifically:
     Uses marker clustering. Click on a cluster to zoom in to see markers (and maybe other clusters).
-->
<html>

<head>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

        #map {
            height: 70%;
            width: 70%;
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
            <h4>Google map with earthquake markers and clustering. Click on a cluster to zoom in to see markers.</h4>
            <h4> Data from following source:
                <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojson">https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojson</a>
            </h4>
            <h4>See all feeds at:
                <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php">https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php</a>
            </h4>
        </header>
        <button type="button" id="earthquakes">Click me</button>
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

    <!-- Need the following code for clustering Google maps markers-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <!-- Need the following code for Google Maps. PLEASE INSERT YOUR OWN GOOGLE MAPS KEY BELOW -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYDa0yOFJwOkLdW7fcpmXHtWDyXSZEHyI&callback=initMap">
    </script>
</body>

</html>