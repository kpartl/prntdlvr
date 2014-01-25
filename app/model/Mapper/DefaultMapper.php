<?php

namespace Model\Mapper;

use LeanMapper\Exception\InvalidStateException;
use LeanMapper;
use Nette;

/**
 * Class DefaultMapper
 * @package Model\Mapper
 */
class DefaultMapper implements LeanMapper\IMapper {

	/** @var string */
	protected $defaultEntityNamespace = 'Model\Entity';

	/** @var string */
	protected $relationshipTableGlue = '_';

	/**
	 * Gets primary key name from given table name
	 *
	 * @param string $table
	 * @return string
	 */
	public function getPrimaryKey($table) {
		return 'ID';
	}

	/**
	 * Gets table name from given fully qualified entity class name
	 *
	 * @param string $entityClass
	 * @return string
	 */
	public function getTable($entityClass) {
		return strtolower($this->trimNamespace($entityClass));
	}

	/**
	 * Gets fully qualified entity class name from given table name
	 *
	 * @param string $table
	 * @param LeanMapper\Row|null $row
	 * @return string
	 */
	public function getEntityClass($table, LeanMapper\Row $row = null) {
		return ($this->defaultEntityNamespace !== null ? $this->defaultEntityNamespace . '\\' : '') . ucfirst(str_replace('_', '', str_replace('TPP_', '', $table)));
	}

	/**
	 * Gets table column name from given fully qualified entity class name and entity field name
	 *
	 * @param string $entityClass
	 * @param string $field
	 * @return string
	 */
	public function getColumn($entityClass, $field) {
		$class = new $entityClass;		
		$refl = $class::getReflection();	
		return $refl->getEntityProperty($field)->getColumn();
		
		
		
//		$className =  $entityClass;
//		$class =		new \Nette\Reflection\ClassType($className);
//		
//		$refl =$class->getReflection();
//		$prop = $refl->getEntityProperty($field);
//		dump($prop);
//		if($prop)echo($prop->getColumn());
//		switch ($entityClass) {
//			case 'DocumentEntity':
//
//				switch ($field) {
//					case 'docNumber': return "[DOC_CUST_DOC_ID]";
//						break;
//					case 'docType': return "[ID_DOC_TYPE]";
//						break;
//					case 'distChannel': return "[DOC_DIST_CHANNEL]";
//						break;
//					case 'custommerNumber': return "[DOC_ID_CUSTOMMER]";
//						break;
//					case 'operator': return "[ID_OPERATOR]";
//						break;
//					case 'dateIn': return "[ID_DATE_IN]";
//						break;
//				}
//				break;
//			case 'StatusEntity':
//				switch ($field) {
//					case 'dateOut': return "[ID_DATE_OUT]";
//						break;
//					case 'dateIn': return "[ID_DATE_IN]";
//						break;
//					case 'docType': return "[ID_DOC_TYPE]";
//						break;
//					case 'statusType': return "[ID_STATUS_DOC]";
//						break;
//					case 'statusType': return "[ID_STATUS_DOC]";
//						break;
//					case 'statusType': return "[ID_STATUS_DOC]";
//						break;
//					case 'statusType': return "[ID_STATUS_DOC]";
//						break;
//					case 'statusType': return "[ID_STATUS_DOC]";
//						break;
//					case 'statusType': return "[ID_STATUS_DOC]";
//						break;
//				}
//				
//				break;
//		}
//		return $field;
	}

	/**
	 * Gets entity field (property) name from given table name and table column
	 *
	 * @param string $table
	 * @param string $column
	 * @return string
	 */
	public function getEntityField($table, $column) {
		$class = $this->getEntityClass($table);		
		$refl = $class::getReflection();
		foreach ($refl->getEntityProperties() as $prop){
			if($prop->getColumn() == $column){			
				return $prop->getName();
			}
		}
		
	}

	/**
	 * Gets relationship table name from given source table name and target table name
	 *
	 * @param string $sourceTable
	 * @param string $targetTable
	 * @return string
	 */
	public function getRelationshipTable($sourceTable, $targetTable) {
		return $sourceTable . $this->relationshipTableGlue . $targetTable;
	}

	/**
	 * Gets name of column that contains foreign key from given source table name and target table name
	 *
	 * @param string $sourceTable
	 * @param string $targetTable
	 * @return string
	 */
	public function getRelationshipColumn($sourceTable, $targetTable) {
		return $targetTable . '_' . $this->getPrimaryKey($targetTable);
	}

	/**
	 * Gets table name from repository class name
	 *
	 * @param string $repositoryClass
	 * @return string
	 * @throws \LeanMapper\Exception\InvalidStateException
	 */
	public function getTableByRepositoryClass($repositoryClass) {
		$matches = array();
		if (preg_match('#([a-z0-9]+)repository$#i', $repositoryClass, $matches)) {
			return strtolower($matches[1]);
		}
		throw new InvalidStateException('Cannot determine table name.');
	}

	/**
	 * Gets filters that should be used used every time when given entity is loaded from database
	 *
	 * @param string $entityClass
	 * @param LeanMapper\Caller|null $caller
	 * @return array|LeanMapper\ImplicitFilters
	 */
	public function getImplicitFilters($entityClass, LeanMapper\Caller $caller = null) {
		return array();
	}

	/**
	 * Trims namespace part from fully qualified class name
	 *
	 * @param $class
	 * @return string
	 */
	protected function trimNamespace($class) {
		$class = explode('\\', $class);
		return end($class);
	}

}
