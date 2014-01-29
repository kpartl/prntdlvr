<?php

namespace Model\Repository;

use Model;

/**
 * Class UserRepository
 * @package Model\Repository
 * @table TPP_USER
 * @entity UserEntity
 * 
 */
class UserRepository extends ARepository {

	public function findByUsername($username) {
		$row = $this->connection->select('*')
				->from($this->getTable())
				->where('username = %s', $username)
				->fetch();

		if ($row === false) {
			return null;
		} else
			return $this->createEntity($row);
	}

}
