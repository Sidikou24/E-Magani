<html lang='en'>
  <head>
    <style>
      #map {
        width: 100%;
        height: 450px;
      }
    </style>
  </head>
  <body>
      <h3>Google map</h3>
    <div id='map'></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
      function initMap(){
        map = new google.maps.Map(document.getElementById("map"), {
              center: { lat: `{{$pharmacies->latitude}}`, lng: `{{$pharmacies->longitude}}` },
              zoom: 8,
            });
      }
    </script>
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN2H0x1f9r8pCM2y3IWIE-1qje5RTa7M4?callback=initMap"></script>
  </body>
</html>