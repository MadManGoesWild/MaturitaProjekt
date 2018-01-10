<?php
// source: D:\www\marauders\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template58cec78abd extends Latte\Runtime\Template
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
    <nav class="navbar navbar-inverse" style="margin: 0; height: 5%">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"><i class="fa fa-compass" aria-hidden="true" 
                       style="color: white; font-size: 170%;margin-top:-1.5%;">  MARAUDER'S MAP</i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
<?php
		if ($user->isLoggedIn()) {
			if (in_array('administrator',$user->getRoles()) || in_array('user',$user->getRoles())) {
				?>                    <li><a style="font-size: 150%" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Users:users")) ?>"><i class="fa fa-address-card" aria-hidden="true">  Uživatelé</i></a></li>
                    <li><a style="font-size: 150%" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("FavouriteLocation:favouriteLocation")) ?>"><i class="fa fa-flag" aria-hidden="true"> Oblíbená místa</i></a></li>
<?php
			}
?>
                    <li><a href="#" style="font-size: 150%" id="addMarker" ><i class="fa fa-map-marker" aria-hidden="true"> Vložit oblíbené místo</i></a></li>
                    <li><a style="font-size: 150%" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>"><i class="fa fa-sign-out" aria-hidden="true">  Odhlásit se</i></a></li>
<?php
		}
		else {
			?>                <li><a style="font-size: 150%; " href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:up")) ?>"><i class="fa fa-user-plus" aria-hidden="true">  Registrace</i></a></li>
                <li><a style="font-size: 150%; " href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>"><i class="fa fa-sign-in" aria-hidden="true">  Přihlásit se</i></a></li>
<?php
		}
?>
            </ul>
        </div>
    </nav>
    
        
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>	<div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 43 */ ?></div>
<?php
			$iterations++;
		}
?>
           
<?php
		$this->renderBlock('content', $this->params, 'html');
?>
        <footer> 
            <div class="footer-bottom" style="height: 5%">
                <div class="container">
                    <p id="copyright"> Copyright © Antonín Dulava 2017 </p>
                </div>
            </div>
        </footer>

        <style>          
        .footer-bottom {
            background: #E3E3E3;
            border-top: 1px solid #DDDDDD;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 100%;
            position: absolute;
            bottom: 0;
        }
        
        #copyright{
                text-align: center;
        }
        
        </style>
        
        
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
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 43');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
	<script src="https://use.fontawesome.com/30be85f70d.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 76 */ ?>/nette.ajax.js"></script>
        
        <script>      
            </script>    
<?php
	}

}
