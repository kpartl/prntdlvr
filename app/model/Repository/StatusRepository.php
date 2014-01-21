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

class StatusRepository extends ARepository
{
	public function findByCompany($company_id) {
		$row = $this->connection->select('*')
				->from($this->getTable())
				->where('ID_COMPANY = %i', $company_id)
				->fetchAll();

		return $this->createEntities($row);
	}
}