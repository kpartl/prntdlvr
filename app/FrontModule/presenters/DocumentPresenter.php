<?php

namespace App\FrontModule;

use Model;
use Nette;

/**
 * Class DocumentPresenter
 * @package App\FrontModule
 */
class DocumentPresenter extends BasePresenter {

	

	/** @persistent */
	public $company_id;

	/** @persistent */
	public $spool_id;

	public function renderDefault($id_spool, $id_company) {
		$id_company = $this->getSession()->getSection("StatusPresenter")->company_id;
		$id_spool = $this->getSession()->getSection("StatusPresenter")->spool_id;
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
		$grid->addColumn('spoolEnvelop', 'Id dokladu')->enableSort();
		$grid->addColumn('docNumber', 'Číslo dokladu')->enableSort();						
		$grid->addColumn('docType', 'Typ')->enableSort();
		$grid->addColumn('custommerNumber', 'Číslo zákazníka')->enableSort();
		$grid->addColumn('docPages', 'Počet listů');
		$grid->addColumn('operator', 'Operátor')->enableSort();
		$grid->addColumn('distChannel', 'Kanál distribuce')->enableSort();
		
		//$grid->addColumn('dateIn', 'Datum')->enableSort();

		//$grid->setRowPrimaryKey('id');

		$grid->setDataSourceCallback($this->getDataSource);
		$grid->setPagination($this->settings['dataSourceLimit'], $this->getDataSourceSum);
		$grid->setFilterFormFactory(function () {
			//$form = new \Nella\Forms\Container;
			$form = new \Nette\Forms\Container;
			//$form->addText('spoolEnvelop');
			//$form->addText('docNumber');

			$form->addSelect('docType', 'nazevTypu', $this->getCiselnik($this->docTypeRepository))->setPrompt(" ");
			$form->addSelect('distChannel', 'nazevTypu', $this->getCiselnik($this->distChannelRepository))->setPrompt(" ");
			$form->addSelect('operator', 'operator', $this->getCiselnik($this->operatorRepository))->setPrompt(" ");
			//\Nella\Forms\Controls\DateTime::$format='d.m.Y';
			//$form->addText('dateIn');
//			$c = $form->addContainer('dateIn');
//			$c->addDateTime('from');
//			$c->addDateTime('to');

			return $form;
		});


		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.datagrid.latte');

		$grid->addCellsTemplate(__DIR__ . '/../templates/Document/documentDatagrid.latte');
		return $grid;
	}

	/**
	 * @param $filter
	 * @param $order
	 * @param $paginator = null
	 * @return 
	 */
	public function prepareDataSource($filter, $order, $paginator = NULL) {
//		$storedParams = null;
//
//		$where = $this->processFilter($filter); //zpracujeme podminku WHERE
//
//		if ($paginator) {
//			$storedParams = array('pageSize' => $paginator->getItemsPerPage(), 'offset' => $paginator->getOffset());
//		}
//
//		if (count($where) > 0)
//			$storedParams['where'] = $where;
//
//		if ($order) {
//			$storedParams['orderBy'] = $this->getColumName($order[0]);
//			$storedParams['ascOrDesc'] = $order[1];
//		}
		$storedParams= $this->prepareParams($filter, $order, $paginator);
		try {

			$selection = $this->documentRepository->findByCompanyAndSpool($this->company_id, $this->spool_id, $storedParams);

			return $selection;
		} catch (\Exception $exc) {
			//echo $exc->getTraceAsSring();
			$this->flashMessage('Odchycena vyjimka'); //stejne to nefunguje, Ajax to utlumi
		}
	}

	

	public function getColumName($propertyName) {
		return($this->mapper->getColumn('\Model\Entity\Document', $propertyName));
	}

}
