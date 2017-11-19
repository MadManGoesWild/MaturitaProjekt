<?php
// source: C:\xampp\htdocs\marauders\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Templatef71d2c944e extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Marauder's Map</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>

<body>
<?php
		if ($user->isLoggedIn()) {
?>
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a class="navbar-nav">Marauder's Map</a></li>
        <li><a class="navbar-nav" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">Odhlasit</a></li>
        <li><a class="navbar-nav" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default")) ?>">Informace</a></li>
    </nav>
<?php
		}
		else {
?>
        <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a class="navbar-nav">Marauder's Map</a></li>
        <li><a class="navbar-nav" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:Up")) ?>">Registrace</a></li>
        <li><a class="navbar-nav" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">Prihlasit se</a></li>
        <li><a class="navbar-nav" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default")) ?>">Informace</a></li>
    </nav>
<?php
		}
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>	<div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 36 */ ?></div>
<?php
			$iterations++;
		}
?>
           
<?php
		$this->renderBlock('content', $this->params, 'html');
?>
        
        <footer class="panel ">
                <p  class="panel-body">Copyright &copy; SŠPU Opava, Antonín Dulava 2017</p>
        
<?php
		$this->renderBlock('scripts', get_defined_vars());
?>
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 36');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockScripts($_args)
	{
?>	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
	}

}
