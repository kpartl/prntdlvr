<?php

use Nette\Application\UI;

/**
 * Sign in/out presenters.
 */
abstract class SignPresenter extends BasePresenter {

	/** @persistent */
	public $backlink;

	/** @var \Model\Repository\UserRepository @inject */
	public $userRepository;

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm() {
		$form = new Nette\Application\UI\Form;
		$form->addText('username', 'Uživatelské jméno:')->setAttribute('class', 'margin8')
				->setRequired('Prosím zadejte uživatelské jméno.');

		$form->addPassword('password', 'Heslo:')->setAttribute('class', 'margin8');
				//->setRequired('Prosím zadejte heslo.');

		$form->addCheckbox('remember', 'Zůstat přihlášen');

		$form->addSubmit('send', 'Přihlásit se')->setAttribute('class', 'btn btn-primary margin8');

		// call method signInFormSucceeded() on success
		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}

	/**
	 * @param $form
	 */
	public function signInFormSucceeded($form) {
		$values = $form->getValues();

		if ($values->remember) {
			$this->getUser()->setExpiration('+ 14 days', FALSE);
		} else {
			$this->getUser()->setExpiration('+ 20 minutes', TRUE);
		}

		try {
			$this->getUser()->login($values->username, $values->password);
		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
			return;
		}

		$this->restoreRequest($this->backlink);
		$this->redirect($this->getRedirectString());
	}

	public function actionOut() {
		$this->getUser()->logout();
		$this->flashMessage('Byli jste odhlášeni.', 'alert-info');
		$this->redirect($this->getRedirectString());
	}

	public function renderIn() {

		parent::startup();
		if ($this->user->isLoggedIn()) {
			$this->redirect($this->getRedirectString());
		}
	}

	//prepsat v potomcich
	abstract public function getRedirectString();
}
