<?php

namespace App\FrontModule;

use Model;
use Nette;

/**
 * Class DocumentPresenter
 * @package App\FrontModule
 */
class DocumentPresenter extends BasePresenter {

	/** @var \Model\Repository\DocumentRepository @inject */
	public $documentRepository;

	/** @persistent */
	public $company_id;

	/** @persistent */
	public $spool_id;

	public function renderDefault($id_spool, $id_company) {
		$this->company_id = $id_company;
		$this->spool_id = $id_spool;
		$this->template->id_spool = $id_spool;
		$this->template->id_company = $id_company; //primarni klic potrebujeme pro navrat na predchozi obrazovku				
	}

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentDocumentDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;
		//$grid->addColumn('id_spool', 'Id statusu')->enableSort();
		$grid->addColumn('spoolEnvelop', 'Id dokladu');
		$grid->addColumn('docNumber', 'Číslo dokladu');
		$grid->addColumn('docType', 'Typ');
		$grid->addColumn('custommerNumber', 'Číslo zákazníka');
		$grid->addColumn('docPages', 'Počet listů');
		$grid->addColumn('distChannel', 'Kanál distribuce');
		$grid->addColumn('operator', 'Operátor');

		//$grid->setRowPrimaryKey('id');

		$grid->setDataSourceCallback($this->getDataSource);
		//$grid->setPagination(10, $this->getDataSourceSum);
//		$grid->setFilterFormFactory(function () {
//			$form = new Nette\Forms\Container;
//			$form->addText('id_spool')->setAttribute('class', 'col-xs-2');
//			//	$form->addText('date_in');			
//
//			return $form;
//		});


		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.datagrid.latte');

		$grid->addCellsTemplate(__DIR__ . '/../templates/Document/documentDatagrid.latte');
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
		$selection = $this->documentRepository->findByCompanyAndSpool($this->company_id, $this->spool_id);
		if ($order) {
			$selection->order(implode(' ', $order));
		}

		return $selection;
	}

}
