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
		if (isset($this->params['users'])) trigger_error('Variable $users overwritten in foreach on line 14');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div id="content" class="container">
    <h2>Uživatelé</h2>
    <table class="table table-bordered table-responsive table-hover">
        <thead>
            <tr>
                <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("id")) ?>">ID</a></th>
                <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("username")) ?>">Jméno uživatele</a></th>
                <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("email")) ?>">Email</a></th>
                <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("role")) ?>">Práva</a></th>           
            </tr>            
        </thead>
        <tbody>
<?php
		$iterations = 0;
		foreach ($userove as $users) {
?>            <tr>
                <td><?php echo LR\Filters::escapeHtmlText($users->id) /* line 15 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText($users->username) /* line 16 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText($users->email) /* line 17 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText($users->role) /* line 18 */ ?></td>
                <td>
                    <div style="text-align: center">
                    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete", [$users->id])) ?>"><button class="btn btn-danger">Smazat</button></a>
                    </div>
                    </td>                    
            </tr>
<?php
			$iterations++;
		}
?>
        </tbody>     
    </table><?php
	}

}
