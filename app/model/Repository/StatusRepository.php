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

	public function findByCompany($company_id) {
		$row = $this->connection->select('*')
				->from($this->getTable())
				->where('ID_COMPANY = %i', $company_id)
				->fetchAll();

		return $this->createEntities($row);
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
