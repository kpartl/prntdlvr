<?php
namespace Model\Entity;
use LeanMapper;

/**
 * 
 * @property Company[] $company m:belongsToMany (User)
 * 
 * @property int $id (ID)
 * @property string $name (COMPANY_NAME)  
 */
class Company extends  AEntity
{
}

