<?php
// source: C:\xampp\htdocs\marauders\app\presenters/templates/Users/users.latte

use Latte\Runtime as LR;

class Templateefb5867999 extends Latte\Runtime\Template
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
		if (isset($this->params['users'])) trigger_error('Variable $users overwritten in foreach on line 6');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<h1> Ahoj </h1>
<div id="content" class="container">
    <h2>Seznam zbraní</h2>
        <ul>
<?php
		$iterations = 0;
		foreach ($userove as $users) {
			?>            <li><?php echo LR\Filters::escapeHtmlText($users->username) /* line 6 */ ?></li>
<?php
			$iterations++;
		}
?>
        </ul>
<?php
	}

}
