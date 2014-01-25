<?php

namespace App\FrontModule;

use Model;
use Nette;
use Nextras;

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

	/** @var \Model\Repository\StatusTypeRepository @inject */
	public $statusTypeRepository;

	/** @persistent */
	//public $company_id;

	public function renderDefault() {

		$tmp = array('company' => $this->getSession()->getSection("StatusPresenter")->company_id);

		$this['companiesForm']->setDefaults($tmp); //z neznamyho duvodu to musim delat pres promennou, jinak to nefunguje		
	}

	public function createComponentCompaniesForm() {
		$form = new Nette\Application\UI\Form;

		//TODO predelat na prihlasenyho uzivatele
		$user = $this->userRepository->find(1);

		//schovame si to pro vyber 1. spolecnosti
		//$this->company_id = -1;

		foreach ($user->companies as $company) {
			$companyNames[$company->id] = $company->name;
			//		if ($this->company_id = null)
			//			$this->company_id = $company->id;  //nastavim vyber selectBoxu na 1. spolecnost
		}

		$select = $form->addSelect('company', 'Společnost', $companyNames)
				->setPrompt("Vyberte společnost");

		$form->addSubmit('change', 'changeButton')->setAttribute('class', 'ajax hide');

		$form->onSuccess[] = $this->companiesFormSucceeded;

		return $form;
	}

	public function companiesFormSucceeded($form) {
		$section = $this->getSession()->getSection("StatusPresenter");
		$section->company_id = $form->values->company;

		//	$this->company_id = $form->values->company;
		$this->template->company_id = $form->values->company;

		$this['statusDatagrid']->invalidateControl();
	}

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentStatusDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;

		$grid->addColumn('id_spool', 'Id spoolu')->enableSort();
		//$grid->addColumn('id_company');
		$grid->addColumn('dateIn', 'Datum přijetí')->enableSort();
		$grid->addColumn('docType', 'Typ dokladu')->enableSort();
		$grid->addColumn('statusType', 'Status zpracovani')->enableSort();
		$grid->addColumn('totalAmountPages', 'Počet')->enableSort();
		$grid->addColumn('totalAmountEnvelop', 'Počet zásilek')->enableSort();
		$grid->addColumn('totalAmountBanner', 'Počet bannerů')->enableSort();
		$grid->addColumn('totalAmountBW', 'Počet ČB stran')->enableSort();
		$grid->addColumn('totalAmountColor', 'Počet barevných stran')->enableSort();
		$grid->addColumn('totalCoverSheet', 'Počet krycích listů')->enableSort();
		$grid->addColumn('totalSheets', 'Počet listů celkem')->enableSort();
		$grid->addColumn('totalAddressAd', 'Počet adresných příloh')->enableSort();
		$grid->addColumn('totalNonAddressAd', 'Počet neadresných příloh')->enableSort();
		$grid->addColumn('totalEleDoc', 'Počet el. dokladů')->enableSort();
		$grid->addColumn('totalSlip', 'Počet složenek')->enableSort();
		$grid->addColumn('totalPostFee', 'Poštovné celkem')->enableSort();
		$grid->addColumn('dateProcess', 'Datum zpracování')->enableSort();
		$grid->addColumn('datePrint', 'Datum vytíštění')->enableSort();
		$grid->addColumn('dateOut', 'Datum vypravení / odeslání')->enableSort();

		$grid->setRowPrimaryKey('id');

		$grid->setDataSourceCallback($this->getDataSource);
		$grid->setPagination($this->settings['dataSourceLimit'], $this->getDataSourceSum);

		$grid->setFilterFormFactory(function () {
			//$form = new Nette\Forms\Container;
			$form = new \Nella\Forms\Container;
			$form->addText('id_spool'); //->setAttribute('class', 'col-xs-2');
			$form->addSelect('docType', 'nazevTypu', $this->getCiselnik($this->docTypeRepository))->setPrompt(" ");
			$form->addSelect('statusType', 'statusType', $this->getCiselnik($this->statusTypeRepository))->setPrompt(" ");
			$form->addDateTime('dateIn');


			return $form;
		});

		$grid->setEditFormFactory(function($row) {
			//$form = new Nette\Forms\Container;
			$form = new \Nella\Forms\Container;
			\Nella\Forms\Controls\DateTime::$format = 'd.m.Y H:i:s';
			$form->addDateTime('dateProcess');
			$form->addDateTime('datePrint');
			$form->addDateTime('dateOut');
			$form->addNumber('totalAmountPages');

			$form->addSubmit('save', 'Uložit');
			$form->addSubmit('cancel', 'Zrušit')->getControlPrototype()->class = 'btn';

			if ($row) {
				$values = array('totalAmountPages' => $row->totalAmountPages, 'id' => $row->id, 'dateProcess' => $row->dateProcess,
					'datePrint' => $row->datePrint, 'dateOut' => $row->dateOut);
				$form->setDefaults($values);
			}
			return $form;
		});

		$grid->setEditFormCallback($this->saveData);

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
	public function prepareDataSource($filter, $order, $paginator = NULL) {
		$storedParams = $this->prepareParams($filter, $order, $paginator);


		$selection = $this->statusRepository->findByCompany($this->getCompanyId(), $storedParams);

		return $selection;
	}

	private function getCompanyId() {
		$companyId = $this['companiesForm']['company']->getValue();
		if ($companyId)
			return $companyId;
		else
			return $this->getSession()->getSection("StatusPresenter")->company_id;
	}

	
	
	public function getColumName($propertyName) {
		return($this->mapper->getColumn('\Model\Entity\Status', $propertyName));
	}

	
	
	public function saveData(Nette\Forms\Container $form) {

		$values = $form->getValues();
//		dump($values);

		$entity = $this->statusRepository->find($values['id']);

		foreach ($values as $k => $v) {
			if ($v) {
				if (!($k == 'id')) {
					//$propertyType = $entity::getReflection()->getEntityProperty($k)->getType();
					//if ($propertyType == "DateTime") {																	
						//$v = new \DateTime($v);
							//$x = $v->format('d.m.Y H:i:s');						
					//}

					$entity->__set($k, $v);
				}
			}
		}
		//$entity->totalAmountPages = $values->totalAmountPages;
		$this->statusRepository->persist($entity);
		$this['statusDatagrid']->invalidateControl();
		//$this->redirect('this');
//		$form->setDefaults($values);		
	}

}
