<?php
// source: D:\www\marauders\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Templateca9e5af0e2 extends Latte\Runtime\Template
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
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 93%;
        margin: 0;
      }
    </style>
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<?php
		if ($user->isLoggedIn()) {
?>
    <div id="map"></div>
<?php
		}
		else {
?>
    <p>Tady bude domovská stránka</p>
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4pGibItpUEhjGsEydo_s38kRoelW46a4&callback=initMap">
    </script>
    <script>
          function getLocation(){
         console.log("Funkce je ok");
         navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            sendData(pos);
        }); 

      }

      function getData(){
          $.ajax({
                type: "GET", 
                url: <?php echo LR\Filters::escapeJs($this->global->uiControl->link("getData!")) ?>,
                error: function(error){
                    console.log(error);
                },
                success: function(success){
                    console.log(success);
            }     
            });
    }

      function sendData(position){
                
            $.ajax({
                type: "POST", 
                url: <?php echo LR\Filters::escapeJs($this->global->uiControl->link("receiveData!")) ?>,
                data: position,
                error: function(error){
                    console.log(error);
                },
                success: function(success){
                    console.log("success");
                    getData();
            }     
            });
        }
</script>
<?php
	}

}
