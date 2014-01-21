<?php

namespace Model\Mapper;

use LeanMapper\Exception\InvalidStateException;
use LeanMapper;
use Nette;

/**
 * Class CompanyMapper
 * @package Model\Mapper
 */
class CompanyMapper extends DefaultMapper{
	public function getEntityClass($table, LeanMapper\Row $row = null) {
		return ($this->defaultEntityNamespace !== null ? $this->defaultEntityNamespace . '\\' : '') . "Company";
	}
}