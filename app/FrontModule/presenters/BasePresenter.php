<?php

namespace App\FrontModule;

use Model;
use Nette;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Base\BaseBasePresenter {

	/** @var \Model\Repository\DocumentRepository @inject */
	public $documentRepository;

	/** @var \Model\Repository\DocTypeRepository @inject */
	public $docTypeRepository;

	/** @var \Model\Repository\OperatorRepository @inject */
	public $operatorRepository;

	/** @var \Model\Repository\DistChannelRepository @inject */
	public $distChannelRepository;

	/** @var \LeanMapper\IMapper @inject */
	public $mapper;

	/** @persistent */
	public $settings = array(
		'dataSourceLimit' => 10
	);

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

		$selection = $this->prepareDataSource($filter, $order, $paginator);
		//TODO
//		if ($paginator) {
//			$selection->limit($paginator->getItemsPerPage(), $paginator->getOffset());
//		}
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
								$where [$this->getColumName($k)] = "  IN (" . implode(",",$v) . ") ";
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

		if (count($where) > 0)
			$storedParams['where'] = $where;

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
