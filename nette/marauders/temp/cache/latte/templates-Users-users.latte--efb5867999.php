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
		if (isset($this->params['users'])) trigger_error('Variable $users overwritten in foreach on line 15');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div id="content" class="container" style="font-family: Verdana, Geneva, sans-serif;">
    <h2 class="text-center">Seznam uživatelů</h2>
    <table class="table table-bordered table-responsive table-hover">
        <thead style="background: lightgrey">
            <tr>
                <th class="text-center"><a href="#" style="color:black;">ID</a></th>
                <th class="text-center"><a href="#" style="color:black;">Jméno uživatele</a></th>
                <th class="text-center"><a href="#" style="color:black;">Email</a></th>
                <th class="text-center"><a href="#" style="color:black;">Práva</a></th>
                <th class="text-center"><a href="#" style="color:black;">Akce</a></th>
            </tr>            
        </thead>
        <tbody>
<?php
		$iterations = 0;
		foreach ($userove as $users) {
?>            <tr>
                <td class="text-center"><?php echo LR\Filters::escapeHtmlText($users->id) /* line 16 */ ?></td>
                <td class="text-center"><?php echo LR\Filters::escapeHtmlText($users->username) /* line 17 */ ?></td>
                <td class="text-center"><?php echo LR\Filters::escapeHtmlText($users->email) /* line 18 */ ?></td>
                <td class="text-center"><?php echo LR\Filters::escapeHtmlText($users->role) /* line 19 */ ?></td>
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
    </table>
</div><?php
	}

}
