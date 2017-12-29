    // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you. 49.93866, 17.90257

      var map, infoWindow;
      function initMap() {
        getLocation();
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 49.93866, lng: 17.90257},
          zoom: 14
        });

        infoWindow = new google.maps.InfoWindow;
        
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {

            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            var contentString = "Poloha uživatele:"+" "+position.coords.latitude +", "+position.coords.longitude;

            var infowindow = new google.maps.InfoWindow({
              content: contentString
            });


            enabledHighAccuracy: true;

            map.setCenter(pos);

            var marker = new google.maps.Marker({
              position: pos,
              map: map,
              label: "Uži" + position.users_id,
              title: 'Tady se nachází uživatel!'
            });   

            marker.addListener('mouseover', function() {
              infoWindow.open(map, marker);
            });
          }, 

          function() {
            handleLocationError(true, infoWindow, map.getCenter());
          },
          );

        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }





      /*function getLocation(){
         console.log("Funkce je ok");
         navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            }; 
        sendData(pos);
      })

      function sendData(position){
        $.post("127.0.0.1/marauders/www/",
        {
          position: position

        },(result)=>{
          console.log(result);
        });

      }*/
