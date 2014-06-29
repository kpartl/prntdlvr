<?php

namespace Model\Repository;

use Model;

/**
 * Class DocumentRepository
 * @package Model\Repository
 * @table TPP_DOCUMENT
 * @entity DocumentEntity
 * 
 */
class DocumentRepository extends ARepository {

	public function findByCompanyAndSpool($company_id, $spool_id, array $storedProcParams = NULL) {

		if ((!$storedProcParams) or (!isSet($storedProcParams['pageSize']))) {

			$row = $this->connection->select('*')
					->from($this->getTable())
					->where('ID_COMPANY = %i ', $company_id)
					->where('ID_SPOOL = %i ', $spool_id);

			$row = $this->prepareSelectParams($row, $storedProcParams)->fetchAll();
			
		} else {			
			
			$where = " ID_COMPANY = $company_id AND ID_SPOOL = $spool_id ";						
			
			$row = $this->connection->query($this->prepareStoredProcParams($where, $storedProcParams))->fetchAll();
		}

		if ($row and count($row) > 0) {
			return $this->createEntities($row);
		} else {			
			return array();
		}
	}
	
	public function getSouhrnFaktur($date_from, $date_to, $params){
	
		$command = "EXEC  [dbo].[SouhrnFaktur] '".$date_from. "', '".$date_to."'";
		$row = $this->connection->query($this->prepareOrderByStoredProcParams($command, $params))->fetchAll();
		
		return $row;
	}

}
