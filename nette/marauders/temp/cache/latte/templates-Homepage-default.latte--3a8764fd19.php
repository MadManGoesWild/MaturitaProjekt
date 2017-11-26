<?php
// source: C:\xampp\htdocs\marauders\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template3a8764fd19 extends Latte\Runtime\Template
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
        height: 90%;
        margin: 0;
        padding: 0;
      }
    </style>
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
?>

<div id="content">

</div>

<?php
		if ($user->isLoggedIn()) {
?>
    <div id="map"></div>
<?php
		}
		
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
<?php
	}

}
