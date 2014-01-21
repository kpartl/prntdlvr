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
	

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentDocumentDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;
		$grid->addColumn('id_spool', 'Id')->enableSort();
		$grid->addColumn('docNumber', 'Id dokladu');
		$grid->addColumn('dateIn', 'Datum přijetí')->enableSort();
		$grid->addColumn('custommerNumber', 'Číslo zákazníka');
		$grid->addColumn('custommerName', 'Jméno zákazníka');

		$grid->setRowPrimaryKey('id');

		$grid->setDataSourceCallback($this->getDataSource);
		//$grid->setPagination(10, $this->getDataSourceSum);

//		$grid->setFilterFormFactory(function () {
//			$form = new Nette\Forms\Container;
//			$form->addText('id_spool')->setAttribute('class', 'col-xs-2');
//			//	$form->addText('date_in');			
//
//			return $form;
//		});

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
		$selection = $this->documentRepository->findByCompanyAndSpool($this->company_id,$this->spool_id);
		if ($order) {
			$selection->order(implode(' ', $order));
		}
		return $selection;
	}

}
