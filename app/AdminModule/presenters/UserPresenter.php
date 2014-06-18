<?php

namespace App\AdminModule;

use Model;
use Nette;
use Nextras;
use Nette\Utils\Html;

/**
 * Class UserPresenter
 * @package App\AdminModule
 */
class UserPresenter extends BasePresenter {

	private static $ADD_FORM = 1;
	private static $EDIT_FORM = 2;
	private static $PASSWORD_FORM = 3;

	/** @var \Model\Repository\RoleRepository @inject */
	public $roleRepository;

	/** @var \Model\Repository\UserCompanyRepository @inject */
	public $userCompanyRepository;

//////////////////////////////////////
//
//  RENDER METODY
//
//////////////////////////////////////

	public function renderDefault($userId = null, $operationType = null) {

//
//		if ($operationType) {
//			if ($operationType == self::$CHANGE_USER) {
//
//				$entity = $this->userRepository->find($userId);
//
//				if (!$entity) {
//					$this->flashMessage('Uživatel nenalezen', 'error');
//					return;
//				}
//
//				$this['editForm']['username']->setValue($entity->username);
//				$this['editForm']['role']->setValue($entity->role->id);
//				$this['editForm']['id']->setValue($entity->id);
//				$this['editForm']['password']->setAttribute('type', 'hidden')->caption = '';
//				$this['editForm']['password2']->setAttribute('type', 'hidden')->caption = '';
//
//				if ($entity->username == $this->user->id) { //nelze mazat aktualne prihlaseneho uzivatele
//					//	$this['editForm']['delete']->setAttribute('style', 'display:none;');
//					//$this['editForm']['role']->setAttribute('style', 'display:none;')->caption = ''; //ani nelze menit roli
//				}
//
//				$companiesArray = array();
//
//				foreach ($entity->companies as $company) {
//					$companiesArray[] = $company->id;
//				}
//
//				$this['editForm']['companies']->setValue($companiesArray);
//
//				$this['editForm']['showCheckbox']->setValue(TRUE);
//			} else if ($operationType == self::$ADD_USER) {
//
//				$this['editForm']['username']->setValue('');
//				$this['editForm']['role']->setValue(3);
//				$this['editForm']['id']->setValue(null);
//
//				$this['editForm']['showCheckbox']->setValue(TRUE);
//			}
//		} else {
//			//	$this['editForm']['showCheckbox']->setValue(FALSE);
//		}
	}

	public function renderEdit($id) {
		$entity = $this->getUserEntity($id);

		$this['editForm']['username']->setValue($entity->username);
		$this['editForm']['role']->setValue($entity->role->id);
		$this['editForm']['id']->setValue($entity->id);

		$companiesArray = array();

		foreach ($entity->companies as $company) {
			$companiesArray[] = $company->id;
		}

		$this['editForm']['companies']->setValue($companiesArray);
	}

	public function renderChangePassword($id) {
		$this['changePasswordForm']['id']->setValue($id);
	}

//////////////////////////////////////
//
//  COMPONENTS
//
//////////////////////////////////////

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentUserDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;

		$grid->addColumn('username', 'Uživatelské jméno');
		$grid->addColumn('role', 'Role');

		$grid->setRowPrimaryKey('id');
//$grid->setEditFormCallback($this->saveData);

		$grid->setDataSourceCallback($this->getDataSource);

		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.datagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../templates/User/userDatagrid.latte');

		return $grid;
	}

//	protected function createComponentButtonsForm() {
//		$form = new Nette\Application\UI\Form;
//		$form->addProtection();
//		$form->getElementPrototype()->class[] = "ajax";
//		$form->addSubmit('addUserButton', 'Přidat uživatele')
//						->setAttribute('class', 'btn btn-success btn-small')
//				->onClick[] = $this->addUserButtonClicked;
//
//		return $form;
//	}

	/**
	 * ADD form
	 * @return Nette\Application\UI\Form
	 */
	public function createComponentAddForm() {
		$form = $this->createBaseForm(self::$ADD_FORM);

		$form->onSuccess[] = callback($this, 'addFormSucceeded');

		return $form;
	}

	/**
	 * EDIT form
	 * 
	 * @return Nette\Application\UI\Form
	 */
	public function createComponentEditForm() {
		$form = $this->createBaseForm(self::$EDIT_FORM);
		$form->onSuccess[] = callback($this, 'editFormSucceeded');
		return $form;
	}

	/**
	 * CHANGE PASSWORD form
	 * 
	 * @return Nette\Application\UI\Form
	 */
	public function createComponentChangePasswordForm() {
		$form = $this->createBaseForm(self::$PASSWORD_FORM);

		$form->onSuccess[] = callback($this, 'passwordFormSucceeded');

		return $form;
	}

	private function createBaseForm($type) {
		$form = new Nette\Application\UI\Form;
		$form->addProtection();
		$form->getElementPrototype()->class[] = "ajax";

		if ($type != self::$PASSWORD_FORM) {
			$form->addText('username', 'Uživatelské jméno:')
					->setRequired('Zadejte uživatelské jméno');
		}

		if ($type != self::$EDIT_FORM) {

			$form->addPassword('password', 'Heslo:')
					->setRequired('Zadejte heslo');


			$form->addPassword('password2', 'Heslo znovu:')
					->setRequired('Potvrďte heslo')
					->addRule($form::EQUAL, 'Hesla se neshodují', $form['password']);
		}

		if ($type != self::$PASSWORD_FORM) {
			$form->addSelect('role', 'Role:', (self::$settings['roles']))->setValue(3);

			$companiesArray = array();

			foreach ($this->companyRepository->findAll() as $company) {
				$companiesArray[$company->id] = $company->name;
			}

			$form->addCheckboxList('companies', 'Společnosti uživtele:', $companiesArray);
		}

		$form->addHidden('id');


		$form->addSubmit('update', 'Uložit')
				->setAttribute('class', 'btn btn-success btn-small');
//->onClick[] = $this->editFormSucceeded;

		$form->addSubmit('cancel', 'Zrušit')
						->setValidationScope(FALSE)
						->setAttribute('class', 'btn btn-default btn-small')
				->onClick[] = $this->formCancelled;

		return $form;
	}

//////////////////////////////////////
//
//  SUBMIT HANDLING
//
//////////////////////////////////////	


	/*
	 * ADD form succeed
	 * 
	 * Ulozeni noveho uzivatele
	 */

	public function addFormSucceeded($form) {
		$entity = new Model\Entity\User();

		$entity->password = $this['addForm']['password']->getValue();

		if ($entity->password != $this['addForm']['password2']->getValue()) {
			$this->flashMessage('Hesla se neshodují', 'error');
			return;
		}

		$entity->username = $this['addForm']['username']->getValue();

		$entity->role = $this->roleRepository->find($this['addForm']['role']->getValue());

		$message = $this->validateEntity($entity);

		if ($message) {

			$this->flashMessage($message, 'error');
		} else {
			$this->userRepository->persist($entity);

			$this->saveUserCompanies($entity->id, $this['addForm']);

			$this->flashMessage('Uživatel byl uložen');

			$this->redirect('default');
		}
	}

	/*
	 * EDIT form succeed
	 * 
	 * Ulozeni noveho uzivatele
	 */

	public function editFormSucceeded($form) {

		$userId = $this['editForm']['id']->getValue();

//		if ($userId and $userId > 0) {
//			$entity = $this->userRepository->find($userId);
//		} else {
//			$entity = new Model\Entity\User();
//
//			$entity->password = $this['editForm']['password']->getValue();
//			if ($entity->password != $this['editForm']['password2']->getValue()) {
//				$this->flashMessage('Hesla se neshodují', 'error');
//				return;
//			}
//		}
		$entity = $this->getUserEntity($userId);
		$entity->username = $this['editForm']['username']->getValue();

		$entity->role = $this->roleRepository->find($this['editForm']['role']->getValue());

//$entity->companies = $userCompanies;

		$message = $this->validateEntity($entity);

		if ($message) {

			$this->flashMessage($message, 'error');
		} else {

			$this->userRepository->persist($entity);

			$this->saveUserCompanies($entity->id, $this['editForm']);

			$this->flashMessage('Uživatel byl uložen');

			$this->redirect('default');
		}
	}

	/*
	 * CHANGE PASSWORD form succeed	 
	 */

	public function passwordFormSucceeded($form) {
		$userId = $this['changePasswordForm']['id']->getValue();

		$entity = $this->getUserEntity($userId);

		$entity->password = \Model\Authenticator::calculateHash($this['changePasswordForm']['password']->getValue());

		$message = $this->validateEntity($entity);

		if ($message) {
			$this->flashMessage($message, 'error');
		} else {

			$this->userRepository->persist($entity);
			$this->flashMessage('Heslo bylo změněno');
			$this->redirect('default');
		}
	}

	/*
	 * Form canceled
	 */

	public function formCancelled() {
		$this->redirect('default');
	}

//	public function saveData(Nette\Forms\Container $form) {
//
//		$values = $form->getValues();
//
//		$entity = $this->userRepository->find($values['id']);
//
//		$entity->username = $values['username'];
//		$oldEntity = $this->userRepository->findByUsername($entity->username);
//		if ($oldEntity) {
//			if ($entity->id != $oldEntity->id) {
//				$this->flashMessage('Uživatel s tímto jménem již existuje', 'error');
//				return;
//			}
//		}
//
//
//		$entity->role = $this->roleRepository->find($values['role']);
//
//		$this->userRepository->persist($entity);
//		$this->redirect('default');
//	}

	private function saveUserCompanies($userId, $form) {
		$userCompanies = array();

		$allCompanies = array();

		$this->userCompanyRepository->deleteByUser($userId);

//iterujeme pres vsechny zaskrtnue spolecnosti a ulozime do db
		foreach ($form['companies']->getValue() as $companyId) {
			$userCompany = new Model\Entity\UserCompany();
			$userCompany->userId = $userId;
			$userCompany->companyId = $companyId;

			$this->userCompanyRepository->persist($userCompany);
		}
	}

	public function handleDelete($id) {
		$this->userRepository->delete($id);
		$this->redirect('default');
	}

	public function getDataSource($filter, $order, \Nette\Utils\Paginator $paginator = NULL) {
		$values = $this->userRepository->findAll();
		return $values;
	}

	/**
	 * 
	 * @param type $entity
	 * @return string popis chyby, pokud neni entita validni, jinak null
	 */
	private function validateEntity($entity) {

		if (!$entity->username)
			return ("Zadejte jméno uživatele");

		if (!$entity->password)
			return ("Zadejte heslo uživatele");

		$user = $this->userRepository->findByUsername($entity->username);


		if ($user) {
			if ($entity->isDetached() or ($user->id != $entity->id))
				return("Uživatel s tímto jménem již existuje");
		}

		return null;
	}

	private function getUserEntity($id) {
		$entity = $this->userRepository->find($id);

		if (!$entity) {
			$this->flashMessage("Uživatel nenalezen!", 'error');
			return;
		}
		return $entity;
	}

//	public function addUserButtonClicked() {
//
//		$this->redirect('default', array('operationType' => self::$ADD_USER));
//	}
}
