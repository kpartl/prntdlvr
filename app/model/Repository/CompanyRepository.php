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
	public function findByName($name) {
		$row = $this->connection->select('*')
				->from($this->getTable())
				->where('COMPANY_NAME = %s', $name)
				->fetch();

		if ($row === false) {
			return null;
		} else
			return $this->createEntity($row);
	}
}