<?php
// source: C:\xampp\htdocs\marauders\app\presenters/templates/Sign/in.latte

use Latte\Runtime as LR;

class Template5c9baa94cc extends Latte\Runtime\Template
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
<?php
		$this->renderBlock('title', get_defined_vars());
?>

<?php
		$this->createTemplate('../components/form.latte', $this->params, "import")->render();
		$this->renderBlock('form', ['signInForm'] + $this->params, 'html');
?>
        
        <p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("fbLogin-open!")) ?>">Login using facebook</a></p>

        <p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("up")) ?>">Ještě nemáš účet? Zaregistruj se!</a></p>

</div>

<style>

</style><?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>    <h1>Přihlásit se</h1>
<?php
	}

}
