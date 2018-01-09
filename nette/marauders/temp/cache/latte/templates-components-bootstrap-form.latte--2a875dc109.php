<?php
// source: C:\xampp\htdocs\nette\marauders\app\presenters\templates\components\bootstrap-form.latte

use Latte\Runtime as LR;

class Template2a875dc109 extends Latte\Runtime\Template
{
	public $blocks = [
		'bootstrap-head' => 'blockBootstrap_head',
		'bootstrap-form' => 'blockBootstrap_form',
	];

	public $blockTypes = [
		'bootstrap-head' => 'html',
		'bootstrap-form' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['error'])) trigger_error('Variable $error overwritten in foreach on line 9');
		if (isset($this->params['name'])) trigger_error('Variable $name overwritten in foreach on line 12');
		if (isset($this->params['input'])) trigger_error('Variable $input overwritten in foreach on line 12');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockBootstrap_head($_args)
	{
		extract($_args);
?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 3 */ ?>/css/styly.css">  
<?php
	}


	function blockBootstrap_form($_args)
	{
		extract($this->params);
		list($form) = $_args + [NULL, ];
		$form = $_form = $this->global->formsStack[] = is_object($form) ? $form : $this->global->uiControl[$form];
		?>    <form class=form-horizontal<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), false) ?>>
<?php
		if ($form->ownErrors) {
?>        <ul class=error>
<?php
			$iterations = 0;
			foreach ($form->ownErrors as $error) {
				?>            <li><?php echo LR\Filters::escapeHtmlText($error) /* line 9 */ ?></li>
<?php
				$iterations++;
			}
?>
        </ul>
<?php
		}
?>

<?php
		$iterations = 0;
		foreach ($form->controls as $name => $input) {
			if (!$input->getOption('rendered') && $input->getOption('type') !== 'hidden') {
				?>        <div<?php if ($_tmp = array_filter(['form-group', $input->required ? 'required' : NULL, $input->error ? 'has-error' : NULL])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>>

            <div class="col-md-3 control-label"><?php
				$_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
				if ($_label = $_input->getLabel()) echo $_label ?></div>

            <div class="col-md-9">
<?php
				if (in_array($input->getOption('type'), ['text', 'select', 'textarea'], TRUE)) {
					?>                    <?php
					$_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $_input->getControl()->addAttributes(['class' => 'form-control']) /* line 20 */ ?>

<?php
				}
				elseif ($input->getOption('type') === 'button') {
					?>                    <?php
					$_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $_input->getControl() /* line 22 */ ?>

<?php
				}
				elseif ($input->getOption('type') === 'checkbox') {
					?>                    <div class="checkbox"><?php
					$_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $_input->getControl() /* line 24 */ ?></div>
<?php
				}
				elseif ($input->getOption('type') === 'radio') {
					?>                    <div class="radio"><?php
					$_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $_input->getControl() /* line 26 */ ?></div>
<?php
				}
				else {
					?>                    <?php
					$_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
					echo $_input->getControl() /* line 28 */ ?>

<?php
				}
?>

<?php
				ob_start(function () {});
				?>                <span class=has-error><?php
				ob_start();
				echo LR\Filters::escapeHtmlText($input->error) /* line 31 */;
				$this->global->ifcontent = ob_get_flush();
?></span>
<?php
				if (rtrim($this->global->ifcontent) === "") ob_end_clean();
				else echo ob_get_clean();
?>
            </div>
        </div>
<?php
			}
			$iterations++;
		}
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>    </form>
<?php
	}

}
