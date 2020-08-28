<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Testing only</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlCRXZoqj-N891EuNNhed9ht9jmFrVQgA"></script>

    <script src="{{URL::asset('js/bestPath.js')}}"></script>
    <script src="{{URL::asset('js/floor1.js')}}"></script>
    <script src="{{URL::asset('js/libraryf1.js')}}"></script>
    
</head>
<body>
<div id="latlong">
    <p>Latitude: <input size="20" type="text" id="latbox" name="lat" > Longitude: <input size="20" type="text" id="lngbox" name="lng" ></p>
</div>

<div id="map">
</div>
<!-- <input type="button" value="Toggle Visibility 1" onclick="overlays[0].toggle();"></input>
 <input type="button" value="Toggle Visibility 2" onclick="overlays[1].toggle();"> -->
</body>
</html>
