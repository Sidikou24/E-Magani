<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Getting started with the Mapbox Directions API</title>
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <!-- <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' /> -->
    <style>
      body {
        margin: 0;
        padding: 0;
      }

      #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
      }
    </style>
  </head>
  <body onload = "getLocation();">
    <div id="map"style="width: 100%; height:100%;">
     <!-- <iframe src='https://www.google.com/maps?q={{$pharmacies->latitude}},{{$pharmacies->longitude}}&hl=es;z=14&output=embed' ></iframe> -->
    </div>
      <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN2H0x1f9r8pCM2y3IWIE-1qje5RTa7M4&callback=initMap&v=weekly"
      defer
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
     function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
      }
      function showPosition(position) {
        getArrayItineraireFromMapBox(
            position.coords.latitude,
            position.coords.longitude,
            "{{$pharmacies->latitude}}",
            "{{$pharmacies->longitude}}" )
      }
      function showError(error) {
        switch (error.code) {
          case error.PERMISSION_DENIED:
            alert("Vous devez autoriser la demande de geolocalisation a remplir dans le formulaire");
            location.reload();
            break;
        }
      }
    </script>
<!-- getArrayItineraireFromMapBox(startLocationLatitude,startLocationLongitude,{{$pharmacies->latitude}},{{$pharmacies->longitude}} -->
<script>
            let map;

          function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
              center: { lat: {{$pharmacies->latitude}}, lng: {{$pharmacies->longitude}} },
              zoom: 8,
            });
          }

          window.initMap = initMap;

        let keyMapBox = "AIzaSyAN2H0x1f9r8pCM2y3IWIE-1qje5RTa7M4"; // pk.eyJ1IjoibG1pajIxIiwiYSI6ImNsMzF2aWp2YTEwemszcHBzNWFjbGpuazkifQ.JYhts2hRovC2gSRfcWcDUA


        //startLocation = [ longitude , latitude ] => coordonnée du depart
        //endtLocation = [ longitude , latitude ] => coordonnée de la destination
        async function getArrayItineraireFromMapBox(startLocationLatitude, startLocationLongitude, endLocationLatitude, endLocationLongitude) {

            //faire une requete à MapBoxApi pour avoir l'itineraire entre les locations
            const query = await fetch(
                `http://api.mapbox.com/directions/v5/mapbox/driving/${startLocationLongitude},${startLocationLatitude};${endLocationLongitude},${endLocationLatitude}?steps=true&geometries=geojson&access_token=${keyMapBox}`,
                { method: 'GET',
                  mode: 'no-cors'}
            );
            const json = await query.json();
            console.log(json);
            console.log(startLocationLongitude);
            console.log(startLocationLatitude);
            console.log(endLocationLongitude);
            console.log(endLocationLatitude);
            const data = json.routes[0];
            const route = data.geometry.coordinates;
            const geojson = {
                type: 'Feature',
                properties: {},
                geometry: {
                    type: 'LineString',
                    coordinates: route
                }
            };

            let arrayItineraireMapBox = geojson.geometry.coordinates;
            let arrayItineraireGoogleMap = [];

            for (var j = 0; j < arrayItineraireMapBox.length; j++) {
                //convertir les doonées latlng de mapbox en données de google map
                arrayItineraireGoogleMap.push(convertMapboxToGoogleMap(arrayItineraireMapBox[j]))
            }

            //afficher l'itineraire dans le map de GooglemMap
            showItineraire(arrayItineraireGoogleMap);
        }

        function showItineraire(arrayItineraire) {
            //create a polyline
            polyline = new google.maps.Polyline({
                path: arrayItineraire,
                strokeColor: '#f39e9e',
                strokeWeight: 5,
                map: map //ton objet qui represente google map dans ton code.
            });
        }

        function convertMapboxToGoogleMap(objectMapBox) {
            return [objectMapBox[1], objectMapBox[0]];
        }

        function convertGoogleMapToMapbox(objectGoogleMap) {
            return [objectGoogleMap[1], objectGoogleMap[0]];
        }



</script>

  </body>
</html>