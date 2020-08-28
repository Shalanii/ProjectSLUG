<!DOCTYPE html>
<html>
<head>
    <title>Gymkhana Club</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
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
</head>
<body>

<div id='back_home'>
<h2>
<a href="/Schedule1">Go Back</a>
<a href="/NewHome">Home</a>
</h2>
</div>

<div id="map" style="width:100%;height:600px;"></div>
<script>
    function initMap() {
        var myLatLng = {lat: 6.89866, lng: 79.861007};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 19,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title:'Gymkhana Tennis Club',
            label: 'Gymkhana Tennis Club'
        });
    }
    initMap();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlCRXZoqj-N891EuNNhed9ht9jmFrVQgA &callback=initMap"
        async defer></script>
</body>
</html>
