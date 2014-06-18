<?php

namespace Model\Repository;

use Model;

/**
 * Class StatusRepository
 * @package Model\Repository
 * @table TPP_STATUS
 * @entity StatusEntity
 * 
 */
class StatusRepository extends ARepository {

	public function findByCompany($company_id, array $storedProcParams = NULL) {		
		if (!isSet($company_id))
			return array();

	if ((!$storedProcParams) or (!isSet($storedProcParams['pageSize']))) {
			$row = $this->connection->select('*')
					->from($this->getTable())
					->where('ID_COMPANY = %i', $company_id);
			$row = $this->prepareSelectParams($row, $storedProcParams)->fetchAll();
		} else {
	 
	
			$where = " ID_COMPANY = $company_id  ";
//			$orderBy = null;
//			$ascOrDesc = null;
//
//			$pageSize = $storedProcParams['pageSize'];
//
//			$offset = $storedProcParams['offset'];
//
//			if (isSet($storedProcParams['orderBy'])) {
//				$orderBy = $storedProcParams['orderBy'];
//				if (isSet($storedProcParams['ascOrDesc']))
//					$ascOrDesc = $storedProcParams['ascOrDesc'];
//			}
//
//			
//
//			if (isSet($storedProcParams['where'])) {
//				foreach ($storedProcParams['where'] as $k => $v) {
//					$whereString = "AND $k $v";
//
//					$where = $where . ($whereString);
//				}
//			}
//
//			$command = "EXEC  [dbo].[PaginateTable] @TableName='[dbo].[TPP_STATUS]', @PageSize= $pageSize, @CurrentPageIndex= $offset ";
//
//			//$where =" ' DOC_CUST_DOC_ID > 3 ' ";
//			if ($where)
//				$command = $command . ", @RowFilter= '$where' ";
//
//			if ($orderBy) {
//				$command = $command . ", @KeyField= ' $orderBy ' ";
//			}
//
//			if ($ascOrDesc) {
//				$command = $command . ", @AscOrDesc= '$ascOrDesc' ";
//			}
//echo($command);
			//	$row = $this->connection->query($command)->fetchAll();
			//echo($this->prepareStoredProcParams($where, $storedProcParams));
			$row = $this->connection->query($this->prepareStoredProcParams($where, $storedProcParams))->fetchAll();
		}

		if ($row and count($row) > 0) {
			return $this->createEntities($row);
		} else {
			return array();
		}
	}

	public function findByCompanyAndSpool($company_id, $spool_id) {
		$row = $this->connection->select('*')
				->from($this->getTable())
				->where('ID_COMPANY = %i', $company_id)
				->where('ID_SPOOL = %i', $spool_id)
				->fetch();

		if ($row === false) {
			throw new \Exception('Entity was not found.');
		}
		return $this->createEntity($row);
	}

}
