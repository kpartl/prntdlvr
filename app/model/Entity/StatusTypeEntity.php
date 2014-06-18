<?php
namespace Model\Entity;
use LeanMapper;

/**
 * @property int $id (ID)
 * @property string $name (NAME)
 */
class StatusType extends AEntity
{	
	const ID_STATUSU_KOMPLETACE = 7;
	const ID_STATUSU_PREDANO_ODESILATELI = 8;
}