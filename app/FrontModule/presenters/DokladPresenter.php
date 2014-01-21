<?php

namespace App\FrontModule;

use Model;
use Nette;

/**
 * Class DokladPresenter
 * @package App\FrontModule
 */
class DokladPresenter extends BasePresenter {

	/** @var \Model\Repository\StatusRepository @inject */
	public $statusRepository;
	

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentDokladDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;
		$grid->addColumn('id_spool', 'Id')->enableSort();
		$grid->addColumn('doc_id', 'Id dokladu');
		$grid->addColumn('customer_id', 'Číslo zákazníka');
		$grid->addColumn('customer_name', 'Jméno zákazníka');

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
		$selection = $this->statusRepository->findByCompany($this->company_id);
		if ($order) {
			$selection->order(implode(' ', $order));
		}
		return $selection;
	}

}
