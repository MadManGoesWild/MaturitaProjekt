<?php
// source: C:\xampp\htdocs\nette\marauders\app\presenters/templates/Sign/in.latte

use Latte\Runtime as LR;

class Template7e4c9d5cd1 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
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

    <div class="row">  
        <div class="col-md-6 col-md-offset-3">
            <div class="form">
<?php
		$this->createTemplate('../components/bootstrap-form.latte', $this->params, "import")->render();
		$this->renderBlock('bootstrap-form', ['signInForm'] + $this->params, 'html');
		?>                <p id="registrovani"><a class="novyUcet" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("up")) ?>">Ještě nemáš účet? Zaregistruj se!</a></p>
                <button id="roundButton" class="fa fa-facebook" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("fbLogin-open!")) ?>"> Přihlášení pomocí Facebooku</button>
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
    
    label{
            margin-top: 3%;
            margin-left: -100%;
    }
    
    #rcorners2 {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding: 20px; 
        width: 200px;
        height: 150px;    
    }

    
    .outset{
            border-radius: 20px;
            margin-right: 35%;
            margin-left: 35%;
            background-color: #d3d3d3
    }
    
    #frm-signInForm {
            text-align: center;
            margin-left: 5%;
            margin-right: 30%;
            margin-top: 5%;
            font-size: 170%;
            font-family: monospace;
    }
   
    .SignInCard{
        margin-top:5%
            
    }
    
    h1 {
        text-align: center;
        font-family: monospace;
        color: #FFFAF0
    }
    
    #frm-signInForm-remember{
        width: 20px;
        height: 20px;
        display:inline;
        margin-left: 0%;

    }
    
    input[name="send"] {
        display:inline;
        text-align: center;
    }
    
    #roundButton{
        font-size: 20px;
        border-radius: 12px;
        background-color: #3B5998;
        color: white;
        padding: 1%;
        margin-left: 2%;
        margin-bottom: 3%
    }
    
    #registrovani {
        margin-left: 3%;
        font-size: 120%
    }
    
</style><?php
	}

}
