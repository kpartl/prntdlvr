<?php

namespace App\AdminModule;

use Model;
use Nette;
use Nextras;
use Nette\Utils\Html;

/**
 * Class CompanyPresenter
 * @package App\AdminModule
 */
class CompanyPresenter extends BasePresenter {

	public function renderDefault() {
		$this->template->companies = $this->companyRepository->findAll();
	}

	public function createComponentAddForm() {
		$form = new Nette\Application\UI\Form;
		$form->addProtection();
		$form->getElementPrototype()->class[] = "ajax";

		$form->addGroup(' ')
				->setOption('embedNext', TRUE);

//
		$form->addCheckbox('showCheckbox', '')->setAttribute('class', 'ajax hide')
				->addCondition($form::FILLED) // conditional rule: if is checkbox checked...
				->toggle('editFormDiv'); // toggle div #sendBox
// subgroup
		$form->addGroup()
				->setOption('container', Html::el('div')->id('editFormDiv'));


		$form->addText('id', 'ID společnosti:')
				//->setDefaultValue('')
				->addConditionOn($form['showCheckbox'], $form::FILLED);
		$form->addText('name', 'Jméno společnosti:')
				//->setDefaultValue('')
				->addConditionOn($form['showCheckbox'], $form::FILLED);

		$form->addSubmit('update', 'Uložit')
						->setAttribute('class', 'btn btn-success btn-small')
				->onClick[] = $this->addFormSucceeded;

		$form->addSubmit('cancel', 'Zrušit')
						->setValidationScope(null)
						->setAttribute('class', 'btn btn-default btn-small')
				->onClick[] = $this->formCancelled;

		return $form;
	}

	public function formCancelled() {
		$this['addForm']['showCheckbox']->setValue(FALSE);
		$this->invalidateControl('addForm');
		$this->redirect('default');
	}

	public function addFormSucceeded($form) {

		$this->invalidateControl('flashes');

		$entityId = $this['addForm']['id']->getValue();

		if ($entityId == '') {
			$this->flashMessage('Zadejte id společnosti', 'warning');
			return;
		}

		if ($this->companyRepository->find($entityId)) {
			$this->flashMessage('Společnost s tímto id již existuje', 'error');
			return;
		}

		$entityName = $this['addForm']['name']->getValue();

		if ($entityName == '') {
			$this->flashMessage('Zadejte jméno společnosti', 'warning');
		} else if ($this->companyRepository->findByName($entityName)) {
			//dump($this->companyRepository->findByName($entityName));
			$this->flashMessage('Společnost s tímto jménem již existuje', 'error');
		} else {
			$entity = new \Model\Entity\Company;
			$entity->id = $entityId;
			$entity->name = $entityName;
			$this->companyRepository->persist($entity);

			$this->redirect('default');
		}
	}

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentCompanyDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;

		$grid->addColumn('id', 'ID společnosti');

		$grid->addColumn('name', 'Název společnosti');

		$grid->setDataSourceCallback($this->getDataSource);

		$grid->setRowPrimaryKey('id');

		$grid->setEditFormFactory(function($row) {
			$form = new \Nella\Forms\Container;
			$form->addText('name');

			$form->addSubmit('save', 'Uložit');
			$form->addSubmit('cancel', 'Zrušit')->getControlPrototype()->class = 'btn';
			if ($row) {
				$values = array('id' => $row->id, 'name' => $row->name);
				$form->setDefaults($values);
			}

			return $form;
		});

		$grid->setEditFormCallback($this->saveData);

		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.datagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../templates/Company/companyDatagrid.latte');

		return $grid;
	}

	public function getDataSource($filter, $order, \Nette\Utils\Paginator $paginator = NULL) {
		$values = $this->companyRepository->findAll();
		return $values;
	}

	public function handleDelete($id) {
		$this->invalidateControl('flashes');
		$company = $this->companyRepository->find($id);
		if ($company) {
			if ($this->statusRepository->findByCompany($id, array())) {
				$this->flashMessage('Společnost nelze smazat, existují k ní spooly', 'error');
			} else {

				$this->companyRepository->delete($company);

				$this->flashMessage('Společnost byla smazána', 'info');

				$this['companyDatagrid']->invalidateControl();
			}
		}
	}

	public function handleAdd() {
		$this['addForm']['showCheckbox']->setValue(TRUE);
		$this->invalidateControl('addForm');
	}

	public function saveData(Nette\Forms\Container $form) {

		$this->invalidateControl('flashes');

		$values = $form->getValues();

		$entity = $this->companyRepository->find($values['id']);

		if ($entity) {
			//	$entity->id = $values['id'];

			$entity->name = $values['name'];
			if ($this->companyRepository->findByName($entity->name)) {
				$this->flashMessage('Společnost s tímto jménem již existuje', 'error');
			} else {
				$this->companyRepository->persist($entity);
				$this->flashMessage('Společnost byla změněna', 'info');
				$this->redirect('default');
			}
		}
	}

}
