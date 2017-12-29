<?php
// source: C:\xampp\htdocs\marauders\app\presenters/templates/Sign/up.latte

use Latte\Runtime as LR;

class Template0ada74d4cb extends Latte\Runtime\Template
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
    <div class="SignUpCard">
        <div class="outset">
<?php
		$this->renderBlock('title', get_defined_vars());
?>

<?php
		/* line 7 */ $_tmp = $this->global->uiControl->getComponent("signUpForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>

            <p id="prihlaseni"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("in")) ?>">Už máš účet? Přihlaš se!</a></p>
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

    input {
        margin-left: 5%;
        margin-bottom: 5%;
        margin-top: 1%;
        height: 40px;
        text-align: left;
    }
    
    
    .outset{
            border-radius: 20px;
            margin-right: 35%;
            margin-left: 35%;
            background-color: #d3d3d3;
            
    }
    
    #frm-signUpForm {
            text-align: center;
            margin-left: 5%;
            margin-right: 30%;
            margin-top: 5%;
            font-size: 150%;
            font-family: monospace;
    }
   
    .SignUpCard{
        margin-top:5%;
        
    }
    
    h1 {
        text-align: center;
        font-family: monospace;
        color: #FFFAF0
    }
    
    #frm-signInForm-username{
        width: 20px;
        height: 20px;
        display:inline;

    }
    
    #frm-signInForm-email{
        width: 20px;
        height: 20px;
        display:inline;

    }
    
    #frm-signInForm-password{
        width: 20px;
        height: 20px;
        margin-left: 10%;
    }
    
    input[name="send"] {
        margin-right: -42%;
        display:inline;
        float: left;
    }
    
    
    #prihlaseni {
        margin-left: 3%;
        font-size: 120%
    }
    
</style><?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>            <h1 id="rcorners1">Registrace</h1>
<?php
	}

}
