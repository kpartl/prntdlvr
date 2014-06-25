<?php

namespace App\FrontModule;

use Model;
use Nette;
use Nextras;
use \Nette\Forms\Container;
use \Model\Entity\StatusType;

Container::extensionMethod('addDatePicker', function (Container $container, $name, $label = NULL) {
	return $container[$name] = new \JanTvrdik\Components\DatePicker($label);
});

/**
 * Class BannerPresenter
 * @package App\FrontModule
 */
class BannerPresenter extends BasePresenter {

	/** @var \Model\Repository\BannerRepository @inject */
	public $bannerRepository;

	public function createComponentDatePicker() {
		//$form = new \Nella\Forms\Container;
		$form = new Nette\Application\UI\Form;

		$date_to = StrFTime("%d-%m-%Y %H:%M:%S", Time());
		$date_from = StrFTime("%d-%m-%Y %H:%M:%S", strToTime("-1 month", strtotime("now")));

		$form->addDatePicker('from')->setValue($date_from);
		$form->addDatePicker('to')->setValue($date_to);
		$form->addSubmit('submittButton')->setAttribute('value', 'OK');

		$form->onSuccess[] = $this->datePickerFormSucceeded;

		return $form;
	}

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
			$date_from = $form['from']->getValue()->format('d.m.Y H:i:s');
			$date_to = $form['to']->getValue()->format('d.m.Y H:i:s');

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

		$date_from = $this['datePicker']['from']->getValue()->format('d.m.Y H:i:s');
		$date_to = $this['datePicker']['to']->getValue()->format('d.m.Y');
		$date_to = $date_to . ' 23:59:59';


		$selection = $this->bannerRepository->getBannerStats($date_from, $date_to, $storedParams);

		return $selection;
	}
	
	/**
	 * @param $filter
	 * @param $order
	 * @return Nette\Database\Table\Selection
	 */
	public function prepareSecondDataSource($filter, $order, $paginator = NULL){
		$storedParams = $this->prepareParams($filter, $order, $paginator);
		
		$date_from = $this['datePicker']['from']->getValue()->format('d.m.Y H:i:s');
		$date_to = $this['datePicker']['to']->getValue()->format('d.m.Y');
		$date_to = $date_to . ' 23:59:59';
		
		$selection = $this->bannerRepository->getTotalBannerStats($date_from, $date_to, $storedParams);

		return $selection;
	}
	
	public function getColumName($propertyName) {
		return $propertyName;
	}

}
