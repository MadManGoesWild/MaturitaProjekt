<?php
// source: C:\xampp\htdocs\nette\marauders\app\presenters/templates/FavouriteLocation/favouriteLocation.latte

use Latte\Runtime as LR;

class Template7921ded0b6 extends Latte\Runtime\Template
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
		if (isset($this->params['locations'])) trigger_error('Variable $locations overwritten in foreach on line 12');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div id="content" class="container">
    <h2>Oblíbené místa</h2>
    <table class="table table-bordered table-responsive table-hover">
        <thead>
            <tr>
                <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("id")) ?>">ID místa</a></th>
                <th><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("name")) ?>">Název místa</a></th>         
            </tr>            
        </thead>
        <tbody>
<?php
		$iterations = 0;
		foreach ($lokace as $locations) {
?>            <tr>
                <td><?php echo LR\Filters::escapeHtmlText($locations->id) /* line 13 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText($locations->name) /* line 14 */ ?></td>
                <td>
                    <div style="text-align: center">
                    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete", [$locations->id])) ?>"><button class="btn btn-danger">Smazat</button></a>
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
