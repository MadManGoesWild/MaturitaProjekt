<?php

namespace App\Forms;

use App\Model;
use Nette;
use Nette\Application\UI\Form;


class SignUpFormFactory
{
	use Nette\SmartObject;

	const PASSWORD_MIN_LENGTH = 7;

	/** @var FormFactory */
	private $factory;

	/** @var Model\UserManager */
	private $userManager;


	public function __construct(FormFactory $factory, Model\UserManager $userManager)
	{
		$this->factory = $factory;
		$this->userManager = $userManager;
	}


	/**
	 * @return Form
	 */
	public function create(callable $onSuccess)
	{
		$form = $this->factory->create();
		$form->addText('username', 'Vyber si uživatelské jméno:')
			->setRequired('Vyber si prosím své uživatelské jméno.');

		$form->addEmail('email', 'Zadej svůj email:')
			->setRequired('Zadej prosím svůj email.');

		$form->addPassword('password', 'Zadej heslo:')
			->setOption('description', sprintf('at least %d characters', self::PASSWORD_MIN_LENGTH))
			->setRequired('Prosím zadej své heslo')
			->addRule($form::MIN_LENGTH, null, self::PASSWORD_MIN_LENGTH);

		$form->addSubmit('send', 'Zaregistrovat se');

		$form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
			try {
				$this->userManager->add($values->username, $values->email, $values->password);
			} catch (Model\DuplicateNameException $e) {
				$form['username']->addError('Uživatelské jméno již existuje!');
				return;
			}
			$onSuccess();
		};

		return $form;
	}
}
