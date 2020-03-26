<!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <div id="_map"></div>
    <iframe src="https://www.google.com/maps/d/embed?mid=1A83Ei34GS9c6ypmEXP7TQGLZo-5a0BDt" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen="false"></iframe>
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    /*lat: -34.397,
                    lng: 150.644*/
                    lat: 46.5852037,
                    lng: 30.7986528,
                },
                zoom: 8
            });

            var kmlLayer = new google.maps.KmlLayer({
                // url: 'https://googlearchive.github.io/js-v2-samples/ggeoxml/cta.kml',
                url: "https://www.pssoftlab.com/nik/apteka.kmz",
                map: map                
            });

            // kmlLayer.setMap(map);

            /*var geocoder = new google.maps.Geocoder;
            geocoder.geocode({
                'address': 'Toledo'
            }, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                    new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    window.alert('Geocode was not successful for the following reason: ' +
                        status);
                }
            });*/
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8UYXk7ixN30JOYIL2od6CO5eQV57oBYM&region=ES&callback=initMap"></script>





</body>

</html>