<?php

namespace App\FrontModule;

use Model;
use Nette;
use Nette\Utils\Arrays;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Base\BaseBasePresenter {

	/** @var \LeanMapper\IMapper @inject */
	public $mapper;

	public function startup() {
		parent::startup();
	}

	/**
	 * @param $filter
	 * @param $order
	 * @param Nette\Utils\Paginator $paginator
	 * @return mixed
	 */
	public function getDataSource($filter, $order, \Nette\Utils\Paginator $paginator = NULL) {

		$selection = $this->prepareDataSource($filter, $order, $paginator);

		return $selection;
	}
	
	/**
	 * @param $filter
	 * @param $order
	 * @param Nette\Utils\Paginator $paginator
	 * @return mixed
	 */
	public function getSecondDataSource($filter, $order, \Nette\Utils\Paginator $paginator = NULL) {

		$selection = $this->prepareSecondDataSource($filter, $order, $paginator);

		return $selection;
	}

	private function processFilter(array $filter) {
		
		$where = array();
		foreach ($filter as $k => $v) {
			if ($v) {
				switch ($k) {
					case 'docType':
					case 'distChannel':
					case 'operator':
					case 'statusType':
						$where [$this->getColumName($k)] = " = $v ";
						break;
					default: {
							if (is_array($v)) {
								if ((Arrays::get($v, 'min', false)) and (Arrays::get($v, 'max', false))) {
									
									$tmp = array();
									$min = "'" . str_replace('-', '', $v['min']['date']) . "'";
									$max = "'" . str_replace('-', '', $v['max']['date']) . "'";

									$where [$this->getColumName($k)] = " >= $min AND ".$this->getColumName($k)." <= $max";
									//$where [$this->getColumName($k)] = " <= $max ";
								} else {
									
									$where [$this->getColumName($k)] = "  IN (" . implode(",", $v) . ") ";
								}
							} else {
								$where [$this->getColumName($k)] = "  $v ";
							}
						}
				}
			}
		}

		return $where;
	}

	/**
	 * @param $filter
	 * @param $order
	 * @param $paginator = null
	 * @return array of WHERE and OrderBy parameters
	 */
	public function prepareParams($filter, $order, $paginator = NULL) {
		$storedParams = array();

		$where = $this->processFilter($filter); //zpracujeme podminku WHERE

		if ($paginator) {
			$storedParams = array('pageSize' => $paginator->getItemsPerPage(), 'offset' => $paginator->getOffset());
		}

		if (count($where) > 0){			
			$storedParams['where'] = $where;
		}

		if ($order) {
			$storedParams['orderBy'] = $this->getColumName($order[0]);
			$storedParams['ascOrDesc'] = $order[1];
		}

		return $storedParams;
	}

	/**
	 * @param $filter
	 * @param $order
	 * @return mixed
	 */
	public function getDataSourceSum($filter, $order) {

		$entity = $this->prepareDataSource($filter, $order);

		return (count($entity));
	}

	public function getOperators() {
		$types = $this->operatorRepository->findAll();
		$typesArray = array();
		foreach ($types as $docType) {
			$typesArray[$docType->id] = $docType->name;
		}

		return $typesArray;
	}

	public function getCiselnik($repository) {
		$values = $repository->findAll();
		$resultArray = array();
		foreach ($values as $v) {
			$resultArray[($v->id)] = $v->name;
		}

		return $resultArray;
	}

}
