<?php
// source: C:\xampp\htdocs\MaturitaProjekt\nette\marauders\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Templatefcabffdd22 extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'content' => 'blockContent',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'content' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('scripts', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		extract($_args);
?>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
        width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
      
      .map-control {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        font-family: 'Roboto','sans-serif';
        margin: 10px;
        /* Hide the control initially, to prevent it from appearing
           before the map loads. */
        display: none;
      }
      /* Display the control once it is inside the map. */
      #map .map-control { display: block; }

      .selector-control {
        font-size: 14px;
        line-height: 30px;
        padding-left: 5px;
        padding-right: 5px;
      }
    </style>
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
		if ($user->isLoggedIn()) {
?>
    <input id="pac-input" class="controls" type="text" placeholder="Hledat místa">
    <div id="map"></div>
    <div id="floating-panel" style="font-size: 120%">
      <strong>Cíl: </strong>
      <select id="end">
        <option>Žádný</option>
        <option value="krmelin, cz">MarkerYou</option>
      </select>
    </div>
    <div id="style-selector-control"  class="map-control">
      <select id="style-selector" class="selector-control">
        <option value="default" selected="selected">Default</option>
        <option value="silver">Silver</option>
        <option value="night">Night</option>
        <option value="retro">Retro</option>
      </select>
    </div>
    <div id="travel-selector-control" style="font-size: 120%"> 
    <b>Prostředek </b>
    <select id="travel-selector">
      <option value="DRIVING">Auto</option>
      <option value="WALKING">Chůze</option>
      <option value="BICYCLING">Kolo</option>
      <option value="TRANSIT">MHD</option>
    </select>
    </div>
<?php
		}
		else {
?>
    <div class="Homepage" style="padding-top: 5%">
        <div class="row text-center">
          <div class="col-lg-4 col-md-6 mb-8">
            <div class="card">
              <img class="card-img-top" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 139 */ ?>/images/projekt1a.png" alt="">
              <div class="card-body">
                <h4 class="card-title">Připoj se!</h4>
                <p class="card-text">Neváhej a připoj se do nově vznikající webové aplikace. Vše je zdarma.</p>
              </div>
              <div class="card-footer">
                <a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:up")) ?>">Registruj se!</a>
              </div>
            </div>
          </div>
             
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <img class="card-img-top" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 152 */ ?>/images/projekt2a.png" alt="">
              <div class="card-body">
                <h4 class="card-title">Najdi své přátele!</h4>
                <p class="card-text">Pozvi své přátele do této webové aplikace a zjisti, kde se právě nachází. Zjednodušte si společné setkání.</p>
              </div>
              <div class="card-footer">
                <a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:up")) ?>">Registruj se!</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <img class="card-img-top" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 165 */ ?>/images/projekt3a.png" alt="">
              <div class="card-body">
                <h4 class="card-title">Měj přehled!</h4>
                <p class="card-text">Přehledná mapa pomáhá k jednoduchosti, vše na jednom místě.</p>
              </div>
              <div class="card-footer">
                <a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:up")) ?>">Registruj se!</a>
              </div>
            </div>
          </div>
      </div>
    </div>
<?php
		}
?>

<?php
	}


	function blockScripts($_args)
	{
		extract($_args);
		$this->renderBlockParent('scripts', get_defined_vars());
?>
	<script src="functions.js"></script>
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4pGibItpUEhjGsEydo_s38kRoelW46a4&libraries=places&callback=initMap">
    </script>
    <script>
        setInterval(getLocation, 5000);
        var shit = false;
        var markersArr = [];
        function clearMarkers(){
          for (var i = 0; i < markersArr.length; i++ ) {
              markersArr[i].setMap(null);
            }
            markersArr.length = 0;
        }

        function getLocation(){
            navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            sendData(pos);
        }); 

      }
      
      function fillSelectOptions(data){
          if(shit)
              return;
          shit = true;
          navigator.geolocation.getCurrentPosition(function(position) {
            let pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            
            let select = document.getElementById("end");
            for (let position of data.message){
                if(pos.lat == position.Latitude && pos.lng == position.Longitude){
                    continue;
                }
                let option = document.createElement("option");
                option.text = position.users_id;
                option.value = position.Latitude + " " + position.Longitude;
                select.add(option);
            }
        });
      }
      

      function drawMarkers(data){
        fillSelectOptions(data);
        console.log("Data: ", data);
        let pos;
        let marker;
        clearMarkers();
        for(let position of data.message){
          pos = {
            lat: Number(position.Latitude),
            lng: Number(position.Longitude)
          };
          
          marker = new google.maps.Marker({
              position: pos,
              map: map,
              label: "" + position.users_id,
              title: 'Tady se nachází uživatel!'
            });
            markersArr.push(marker);   
        }
        
      }

        function getData(){
          $.ajax({
                // Pomocí požadavku GET server získá pozici z databáze
                type: "GET",
                // Požadavek se posílá na adresu getData!
                url: <?php echo LR\Filters::escapeJs($this->global->uiControl->link("getData!")) ?>,
                // V případě erroru se vypíše chybová hláška do konzole
                error: function(error){
                    console.log(error);
                },
                // Když se podaří získat pozici z databáze vypíše se do konzole hláška        
                success: function(success){
                    console.log("Ze serveru",success);
                    drawMarkers(success);
                }     
            });
        }     

        function sendData(position){            
            $.ajax({
                // Požadavek POST odešle pozici uživatele na server a uloží do databáze
                type: "POST", 
                // Požadavek se posílá na adresu receiveData!
                url: <?php echo LR\Filters::escapeJs($this->global->uiControl->link("receiveData!")) ?>,
                // Jako odeslané data odesílá proměnnou position
                data: position,
                // V případě chyby se odešle chybová hláška do konzole        
                error: function(error){
                    console.log(error);
                },
                // Při úspěchu se vypíše do konzole hláška         
                success: function(success){
                    console.log("Uživatel");
                    getData();
                }     
            });
        }
        
</script>

    <script>
        
        getFavouriteLocations();
        
        var listener;
        $("#addMarker").click( function(event){
            event.preventDefault();
            listener = map.addListener("click", getLatLng);
        })
      
        //ev je pro event
        function getLatLng(ev){
            let latitude = ev.latLng.lat();
            let longitude = ev.latLng.lng();
            console.log( latitude + ', ' + longitude );
            let position = {
                lat: latitude,
                lng: longitude
            };
            var name = prompt("Zadejte název místa: ");
            
            if(name == null || name == "")
                return;
            marker = new google.maps.Marker({
              position: position,
              map: map,
              label: name,
              title: 'oblibene misto',
              icon: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"
            });
            
            position.name = name;
            sendFavouriteLocation(position);
            google.maps.event.removeListener(listener);
        }
        
        function sendFavouriteLocation(position){
            $.ajax({
                type: "POST", 
                url: <?php echo LR\Filters::escapeJs($this->global->uiControl->link("receiveFavouriteLocationData!")) ?>,
                data: position,
                error: function(error){
                    console.log(error);
                },
                success: function(success){
                    console.log(success);
                }     
            });
        }
        
        function getFavouriteLocations(){
            $.ajax({
                type: "GET",
                url: <?php echo LR\Filters::escapeJs($this->global->uiControl->link("getFavouriteLocationsData!")) ?>,
                error: function(error){
                    console.log(error);
                },
                success: function(success){
                    console.log("oblibene mista", success);
                    drawLocationMarkers(success);
                }     
            });
        }
        
        function drawLocationMarkers(data){
            let pos;
            let marker;
            for(let position of data.message){
                pos = {
                  lat: Number(position.latitude),
                  lng: Number(position.longitude)
                };
          
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                label: position.name,
                icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
              });
            }
        }
        
    </script>

<?php
	}

}
