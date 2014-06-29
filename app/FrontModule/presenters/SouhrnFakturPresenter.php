<?php

namespace App\FrontModule;

use Model;
use Nette;
use Nextras;
use \Nette\Forms\Container;
use \Model\Entity\StatusType;

/**
 * Class BannerPresenter
 * @package App\FrontModule
 */
class SouhrnFakturPresenter extends DatePickerBasePresenter {

	/** @var \Model\Repository\DocumentRepository @inject */
	public $documentRepository;

	public function datePickerFormSucceeded($form) {
		if ($form['submittButton']->isSubmittedBy()) {
			$dates = $this->getDates();
			$date_from = $dates['date_from'];
			$date_to = $dates['date_to'];

			$this['fakturyDatagrid']->invalidateControl();
		}
	}

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentFakturyDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;

		$grid->addColumn('ID_SPOOL', 'Id spoolu')->enableSort();
		$grid->addColumn('TYPE', 'Typ dokladu')->enableSort();
		$grid->addColumn('ID_DATE_OUT', 'Datum odeslání')->enableSort();
		$grid->addColumn('DOC_COUNT1', 'Počet obálek Česká pošta')->enableSort();
		$grid->addColumn('DOC_COUNT2', 'Počet obálek Post mail')->enableSort();
		$grid->addColumn('DOC_COUNT3', 'Počet obálek Red mail')->enableSort();
		$grid->addColumn('DOC_COUNT4', 'Počet obálek Off mail')->enableSort();
		$grid->addColumn('DOC_PRICE1', 'Cena Česká pošta')->enableSort();
		$grid->addColumn('DOC_PRICE2', 'Cena Post mail')->enableSort();
		$grid->addColumn('DOC_PRICE3', 'Cena Red mail')->enableSort();
		$grid->addColumn('DOC_PRICE4', 'Cena Off mail')->enableSort();
		$grid->addColumn('DOC_PRICE_TOTAL', 'Cena celkem')->enableSort();

		$grid->setDataSourceCallback($this->getDataSource);

		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.datagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.extended-pagination.datagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../templates/SouhrnFaktur/souhrnFakturDatagrid.latte');

		return $grid;
	}

	/**
	 * @param $filter
	 * @param $order
	 * @return Nette\Database\Table\Selection
	 */
	public function prepareDataSource($filter, $order, $paginator = NULL) {

		$storedParams = $this->prepareParams($filter, $order, $paginator);

		$dates = $this->getDates();
		$date_from = $dates['date_from'];
		$date_to = $dates['date_to'];

		$selection = $this->documentRepository->getSouhrnFaktur($date_from, $date_to, $storedParams);

		return $selection;
	}

}
