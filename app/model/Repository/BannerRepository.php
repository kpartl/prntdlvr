<?php

namespace Model\Repository;

use Model;

/**
 * Class BannerRepository
 * @package Model\Repository
 * @table TPP_STATUS
 * @entity StatusEntity
 * 
 */
class BannerRepository extends ARepository {
	
	public function getBannerStats($date_from, $date_to, $params){
	
		$command = "EXEC  [dbo].[GetBannerStats] '".$date_from. "', '".$date_to."'";
		$row = $this->connection->query($this->prepareStoredProcParams($command, $params))->fetchAll();
		
		return $row;
	}
	
	public function getTotalBannerStats($date_from, $date_to, $params){
		$command = "EXEC  [dbo].[GetTotalBannerStats] '".$date_from. "', '".$date_to."'";
		$row = $this->connection->query($this->prepareStoredProcParams($command, $params))->fetchAll();
		
		return $row;
	}
	
	
	public function prepareStoredProcParams($command, array $storedProcParams) {
		$orderBy = null;
		$ascOrDesc = null;
		if (isSet($storedProcParams['orderBy'])) {
			$orderBy = $storedProcParams['orderBy'];
			if (isSet($storedProcParams['ascOrDesc']))
				$ascOrDesc = $storedProcParams['ascOrDesc'];
		}
		
		if ($orderBy) {
			$command = $command . ", @KeyField= ' $orderBy ' ";
		}

		if ($ascOrDesc) {
			$command = $command . ", @AscOrDesc= '$ascOrDesc' ";
		}
		
		return $command;
	}
	
	
}
