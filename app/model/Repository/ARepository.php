<?php

namespace Model\Repository;

use LeanMapper;
use Model;

/**
 * Class ARepository
 * @package Model\Repository
 */
abstract class ARepository extends \LeanMapper\Repository {

	public function find($id) {
		$row = $this->connection->select('*')
				->from($this->getTable())
				->where('id = %i', $id)
				->fetch();

		if ($row === false) {
			throw new \Exception('Entity was not found.');
		}
		return $this->createEntity($row);
	}

	/**
	 * @param null $query
	 * @return array
	 */
	public function findAll($query = NULL) {
		$statement = $this->connection->select('*')
				->from($this->getTable());
		//\Model\CommonFilter::apply($statement, $query);

		return $this->createEntities(
						$statement->fetchAll()
		);
	}

	public function prepareSelectParams($row, array $storedProcParams) {

		if (isSet($storedProcParams['where'])) {

			foreach ($storedProcParams['where'] as $k => $v) {
				$whereString = "$k $v";

				$row->where($whereString);
			}
		}

		if (isSet($storedProcParams['orderBy'])) {
			$orderString = $storedProcParams['orderBy'];

			if (isSet($storedProcParams['ascOrDesc']))
				$orderString = $orderString . " " . $storedProcParams['ascOrDesc'];

			$row->orderBy($orderString);
		}
		return $row;
	}

	public function prepareStoredProcParams($where, array $storedProcParams) {
		$orderBy = null;
		$ascOrDesc = null;

		$pageSize = $storedProcParams['pageSize'];

		$offset = $storedProcParams['offset'];

		if (isSet($storedProcParams['orderBy'])) {
			$orderBy = $storedProcParams['orderBy'];
			if (isSet($storedProcParams['ascOrDesc']))
				$ascOrDesc = $storedProcParams['ascOrDesc'];
		}


		if (isSet($storedProcParams['where'])) {
			foreach ($storedProcParams['where'] as $k => $v) {
				$whereString = "AND $k $v";

				$where = $where . ($whereString);
			}
		}

		$command = "EXEC  [dbo].[PaginateTable] @TableName='[dbo]." . $this->getTable() . "', @PageSize= $pageSize, @CurrentPageIndex= $offset ";


		if ($where)
			$command = $command . ", @RowFilter= '$where' ";

		if ($orderBy) {
			$command = $command . ", @KeyField= ' $orderBy ' ";
		}

		if ($ascOrDesc) {
			$command = $command . ", @AscOrDesc= '$ascOrDesc' ";
		}
		
		return $command;
	}

}
