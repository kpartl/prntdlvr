<?php
namespace Model\Repository;

use Model;

/**
 * Class CompanyRepository
 * @package Model\Repository
 * @table TPP_COMPANY
 * @entity CompanyEntity	
 * 
 */


class CompanyRepository extends ARepository
{
	/**
	 * @param Model\Entity\User $user
	 * @return array
	 */
	public function findByUser($user) {		
		$statement = $this->connection->select('*')				
				->from($this->getTable());	
			\Model\CommonFilter::apply($statement, $query);

		return $this->createEntities(
						$statement->fetchAll()
		);
	}
}