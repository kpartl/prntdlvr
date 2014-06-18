<?php

namespace Model\Entity;

use LeanMapper;
use LeanMapper\Relationship\HasMany;
use Nette\Forms\Form;
use Nette\Forms\Container;

/**
 * Class AEntity
 * @package Model\Entity
 */
abstract class AEntity extends LeanMapper\Entity {

	public function setFormDefaults(Container $form) {
		foreach ($this->getCurrentReflection()->getEntityProperties() as $property) {
			$name = $property->getName();		
			if (isset($form[$name])) {					
				if ($property->getColumn() !== null) {
					$form[$name]->setDefaultValue($this->row->{$property->getColumn()});
				} else {
					$relationship = $property->getRelationship();
					if ($relationship instanceof HasMany) {
						$values = array();
						$idField = $this->mapper->getEntityField(
							$relationship->getTargetTable(),
							$this->mapper->getPrimaryKey($relationship->getTargetTable())
						);
						foreach ($this->$name as $value) {
							$values[] = $value->$idField;
						}
						$form[$name]->setDefaultValue($values);
					}
				}
			}
		}
	}
	
	/**
	 * Umožňuje předat entitě místo navázaných entit jejich 'id'
	 *
	 * @param string $name
	 * @param mixed  $value
	 */
	function __set($name, $value) {
		$property = $this->getCurrentReflection()->getEntityProperty($name);
		$relationship = $property->getRelationship();
		if (($relationship instanceof LeanMapper\Relationship\HasOne) and !($value instanceof LeanMapper\Entity)) {
			$column = $property->getColumn();
			$this->row->$column = $value;
			$this->row->cleanReferencedRowsCache($relationship->getTargetTable(), $column);
		} else {
			parent::__set($name, $value);
		}
	}

	/*
	 * vrati data pouzitelna ve formulari - tedy stejne jako getData, ale v pripade
	 * property s relací vrátí id z databáze a nikoliv entitu
	 */

	function getRawData() {
		$data = array();
		$rowData = $this->row->getData();

		// projdu entitu a pro kazdou property co najdu sparuji row data
		foreach ($this->getCurrentReflection()->getEntityProperties() as $property) {
			/*
			if (isset($rowData[$property->getColumn()])) {
				echo $rowData[$property->getColumn()];
				$data[$property->getName()] = $rowData[$property->getColumn()];
			}
			*/
			// experimentalne odzkouseno - pokud znam nazev sloupce, dam ho do vysledku jako null
			// pokud k nemu najdu i hodnotu, prepisu null hodnotu (u prazdnych, resp. null hodnot, to nedavalo nazev sloupce do vysledku)
			if ($property->getColumn()) {
				$data[$property->getName()] = null;
				if (isset($rowData[$property->getColumn()])) {
					$data[$property->getName()] = $rowData[$property->getColumn()];
				}
			}
		}
		return $data;
	}
		

} 