<?php

namespace App\FrontModule;

use Model;
use Nette;

/**
 * Class StatusPresenter
 * @package App\FrontModule
 */
class StatusPresenter extends BasePresenter {

	/** @var \Model\Repository\CompanyRepository @inject */
	public $companyRepository;

	/** @var \Model\Repository\UserRepository @inject */
	public $userRepository;

	/** @var \Model\Repository\StatusRepository @inject */
	public $statusRepository;

	/** @persistent */
	public $company_id;
	
	

	public function renderDefault($company = NULL) {				
		$this->company_id = $company;
		$tmp = array('company' => $this->company_id);

		$this['companiesForm']->setDefaults($tmp);	//z neznamyho duvodu to musim delat pres promennou, jinak to nefunguje		
	
	}
	
	
	public function createComponentCompaniesForm() {
		$form = new Nette\Application\UI\Form;

		//TODO predelat na prihlasenyho uzivatele
		$user = $this->userRepository->find(1);

		//schovame si to pro vyber 1. spolecnosti
		//$this->company_id = -1;

		foreach ($user->companies as $company) {
			$companyNames[$company->id] = $company->name;
			if ($this->company_id = null)
				$this->company_id = $company->id;  //nastavim vyber selectBoxu na 1. spolecnost
		}

		$select = $form->addSelect('company', 'Společnost', $companyNames)
				->setPrompt("Vyberte společnost");

		$form->addSubmit('change', 'changeButton')->setAttribute('class', 'ajax hide');

		$form->onSuccess[] = $this->companiesFormSucceeded;

		return $form;
	}

	public function companiesFormSucceeded($form) {
		$this->company_id = $form->values->company;
		$this->template->company_id = $form->values->company;

		$this['statusDatagrid']->invalidateControl();
	}

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentStatusDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;
		$grid->addColumn('id_spool', 'Id')->enableSort();
		//$grid->addColumn('id_company');
		$grid->addColumn('dateIn', 'Datum přijetí')->enableSort();
		$grid->addColumn('docType', 'Typ dokladu')->enableSort();
		$grid->addColumn('totalAmountPages', 'Celkem stran');

		$grid->setRowPrimaryKey('id');

		$grid->setDataSourceCallback($this->getDataSource);
		$grid->setPagination(10, $this->getDataSourceSum);

		$grid->setFilterFormFactory(function () {
			$form = new Nette\Forms\Container;
			$form->addText('id_spool')->setAttribute('class', 'col-xs-2');
			//	$form->addText('date_in');			

			return $form;
		});

		//$grid->addCellsTemplate(__DIR__ . '/../../templates/defaultDatagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.datagrid.latte');
		//$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.extended-pagination.datagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../templates/Status/statusDatagrid.latte');

		return $grid;
	}

	/**
	 * @param $filter
	 * @param $order
	 * @return Nette\Database\Table\Selection
	 */
	public function prepareDataSource($filter, $order) {
		$filters = array();
		foreach ($filter as $k => $v) {
			if (is_array($v))
				$filters[$k] = $v;
			else
				$filters[$k . ' LIKE ?'] = "%$v%";
		}		
		
		//$selection = $this->statusRepository->findByCompany($this->company_id);
		$selection = $this->statusRepository->findByCompany($this->getCompanyId());
		if ($order) {
			$selection->order(implode(' ', $order));
		}
		//if(!$selection)echo('Jsem v prepareDataSource');

		return $selection;
	}
	
	private function getCompanyId(){						
		//dump($this->getHttpRequest()->getQuery('company'));
		//dump($this['companiesForm']['company']->getValue());
		$companyId = $this['companiesForm']['company']->getValue();
		if($companyId) return $companyId;
		else return $this->getParameter('company') ? $this->getParameter('company') : null;
	}

}
