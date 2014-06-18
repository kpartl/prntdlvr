<?php

namespace Model\Repository;

use Model;

/**
 * Class UserCompanyRepository
 * @package Model\Repository
 * @table TPP_USER_COMPANY
 * @entity UserCompanyEntity
 * 
 */
class UserCompanyRepository extends ARepository {

	public function findByUserCompany($userId, $companyId) {
		$row = $this->connection->select('*')
				->from($this->getTable())
				->where('USER_ID = %i', $userId)
				->where('COMPANY_ID = %i', $companyId)
				->fetch();

		if ($row === false) {
			return null;
		} else
			return $this->createEntity($row);
	}
	
	public function findByUser($userId) {	
		$statement = $this->connection->select('*')
				->from($this->getTable())
				->where('USER_ID = %i', $userId);
										

		return $this->createEntities(
						$statement->fetchAll()
		);
	}
	
	public function deleteByUser($userId){
		$statement = $this->connection
				->delete($this->getTable())
				->where('USER_ID = %i', $userId);
				return $statement->execute();
	}

}