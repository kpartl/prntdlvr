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
class BannerPresenter extends DatePickerBasePresenter {

	/** @var \Model\Repository\BannerRepository @inject */
	public $bannerRepository;

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentTotalBannerDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;
		$grid->addColumn('B_NAME', 'Název banneru')->enableSort();
		$grid->addColumn('B_TOTAL_PRICE_A', 'Celková cena A')->enableSort();
		$grid->addColumn('B_TOTAL_PRICE_B', 'Celková cena B')->enableSort();
		$grid->addColumn('B_TOTAL_PRICE_C', 'Celková cena C')->enableSort();
		$grid->addColumn('B_TOTAL_PRICE', 'Celková cena')->enableSort();

		$grid->setDataSourceCallback($this->getSecondDataSource);

		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.datagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.extended-pagination.datagrid.latte');


		return $grid;
	}

	/**
	 * @return \Nextras\Datagrid\Datagrid
	 */
	public function createComponentBannerDatagrid() {
		$grid = new \Nextras\Datagrid\Datagrid;

		$grid->addColumn('ID_SPOOL', 'Id spoolu')->enableSort();
		$grid->addColumn('TYPE', 'Typ dokladu')->enableSort();
		$grid->addColumn('ID_DATE_OUT', 'Datum odeslání')->enableSort();
		$grid->addColumn('B_NAME', 'Název banneru')->enableSort();
		$grid->addColumn('B1_SUM', 'Typ banneru A')->enableSort();
		$grid->addColumn('B2_SUM', 'Typ banneru B')->enableSort();
		$grid->addColumn('B3_SUM', 'Typ banneru C')->enableSort();
		$grid->addColumn('B_TOTAL_PRICE_A', 'Cena A')->enableSort();
		$grid->addColumn('B_TOTAL_PRICE_B', 'Cena B')->enableSort();
		$grid->addColumn('B_TOTAL_PRICE_C', 'Cena C')->enableSort();

		$grid->setRowPrimaryKey('ID');

		$grid->setDataSourceCallback($this->getDataSource);

		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.datagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../../templates/@bootstrap3.extended-pagination.datagrid.latte');
		$grid->addCellsTemplate(__DIR__ . '/../templates/Banner/bannerDatagrid.latte');

		return $grid;
	}

	public function datePickerFormSucceeded($form) {
		if ($form['submittButton']->isSubmittedBy()) {
			$dates = $this->getDates();
			$date_from = $dates['date_from'];
			$date_to = $dates['date_to'];

			$this['bannerDatagrid']->invalidateControl();
		}
		//$this->redirect('this');
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

		$selection = $this->bannerRepository->getBannerStats($date_from, $date_to, $storedParams);

		return $selection;
	}

	/**
	 * @param $filter
	 * @param $order
	 * @return Nette\Database\Table\Selection
	 */
	public function prepareSecondDataSource($filter, $order, $paginator = NULL) {
		$storedParams = $this->prepareParams($filter, $order, $paginator);

		$dates = $this->getDates();
		$date_from = $dates['date_from'];
		$date_to = $dates['date_to'];

		$selection = $this->bannerRepository->getTotalBannerStats($date_from, $date_to, $storedParams);

		return $selection;
	}

}
