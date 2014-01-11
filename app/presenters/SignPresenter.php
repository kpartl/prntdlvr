<?php

use Nette\Application\UI;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter {

    /** @persistent */
    public $backlink = '';

    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     */
    protected function createComponentSignInForm() {
        $form = new UI\Form;
        $form->addText('username', 'Uživatelské jméno:')
                ->setRequired('Zadejte své uživatelské jméno.');

        $form->addPassword('password', 'Heslo:')
                ->setRequired('Zadejte své heslo.');

        $form->addCheckbox('remember', 'Pamatovat si mě');

        $form->addSubmit('send', 'Přihlásit');

        // call method signInFormSucceeded() on success
        $form->onSuccess[] = $this->signInFormSucceeded;
        return $form;
    }

    public function signInFormSucceeded($form) {
        try {
            $values = $form->getValues();
            $this->getUser()->login($values->username, $values->password);
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError($e->getMessage());
            return;
        }

        $this->restoreRequest($this->backlink);
        $this->redirect('Titulka:');
    }

    public function actionOut() {
        $this->getUser()->logout();
        $this->flashMessage('Byl jste odhlášen.');
        $this->redirect('in');
    }

}
