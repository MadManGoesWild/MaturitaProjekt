<?php
// source: C:\xampp\htdocs\MaturitaProjekt\nette\marauders\app\presenters/templates/Sign/out.latte

use Latte\Runtime as LR;

class Template35d50e763b extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'title' => 'blockTitle',
	];

	public $blockTypes = [
		'content' => 'html',
		'title' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container-fluid">
    <div class="SignOutCard">
        <div class="outset">
<?php
		$this->renderBlock('title', get_defined_vars());
?>
              
                <p id="zpet"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Zpět na hlavní stránku</a></p>
        </div>
    </div>
</div>

<style>
    #rcorners1 {
        border-radius: 25px;
        background: #73AD21;
        margin-top: 1%;
        background-color: #808080;
}
    
    .outset{
            border-radius: 20px;
            margin-right: 35%;
            margin-left: 35%;
            background-color: #d3d3d3
    }
    
    .SignOutCard{
        margin-top:5%
            
    }
    
    h1 {
        text-align: center;
        font-family: monospace;
        color: #FFFAF0
    }
    
    
    #zpet {
        margin-left: 3%;
        font-size: 160%;
        text-align: center;
    }
    
</style><?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>            <h1 id="rcorners1">Úspěšně jsi byl odhlášen</h1>
<?php
	}

}
