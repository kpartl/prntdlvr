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

class DocumentRepository extends ARepository
{
	public function findByCompanyAndSpool($company_id, $spool_id) {
		$row = $this->connection->select('*')
				->from($this->getTable())
				->where('ID_COMPANY = %i ', $company_id)
				->where('ID_SPOOL = %i ', $spool_id)
				->fetchAll();

		return $this->createEntities($row);
	}
}