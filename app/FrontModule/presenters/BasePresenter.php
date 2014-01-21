<?php

namespace App\FrontModule;

use Model;
use Nette;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Base\BaseBasePresenter {

	public function startup() {
		parent::startup();
	}

	public function beforeRender() {
		parent::beforeRender();
	}

	/**
	 * @param $filter
	 * @param $order
	 * @param Nette\Utils\Paginator $paginator
	 * @return mixed
	 */
	public function getDataSource($filter, $order, \Nette\Utils\Paginator $paginator = NULL) {
		$selection = $this->prepareDataSource($filter, $order);
		//TODO
//		if ($paginator) {
//			$selection->limit($paginator->getItemsPerPage(), $paginator->getOffset());
//		}
		return $selection;
	}

	/**
	 * @param $filter
	 * @param $order
	 * @return mixed
	 */
	public function getDataSourceSum($filter, $order) {
		$entity=$this->prepareDataSource($filter, $order);
		return (count($entity));
	}

}
