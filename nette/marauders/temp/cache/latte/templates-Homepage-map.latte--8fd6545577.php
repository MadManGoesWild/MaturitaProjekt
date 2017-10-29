<?php
// source: C:\xampp\htdocs\marauders\app\presenters/templates/Homepage/map.latte

use Latte\Runtime as LR;

class Template8fd6545577 extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'content' => 'blockContent',
		'title' => 'blockTitle',
		'mapa' => 'blockMapa',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'content' => 'html',
		'title' => 'html',
		'mapa' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
		$this->renderBlock('content', get_defined_vars());
		$this->renderBlock('mapa', get_defined_vars());
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
        height: 100%;
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
<div id="banner">
<?php
		$this->renderBlock('title', get_defined_vars());
?>
</div>

<div id="content">

</div>
<div id="map"></div>
        
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>	<h1>Mapišta</h1>
<?php
	}


	function blockMapa($_args)
	{
		
	}


	function blockScripts($_args)
	{
		extract($_args);
		$this->renderBlockParent('scripts', get_defined_vars());
?>
	<script src="test.js"></script>
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4pGibItpUEhjGsEydo_s38kRoelW46a4&callback=initMap">
    </script>
<?php
	}

}
