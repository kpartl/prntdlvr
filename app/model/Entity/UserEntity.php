<?php
namespace Model\Entity;
use LeanMapper;

/**
 * @property int $id (ID)
 * @property string $username (USERNAME)
 * @property string $password (PASSWORD)
 * @property Role $role m:hasOne (ROLE:TPP_ROLE)
 * @property Company[] $companies m:hasMany (USER_ID:TPP_USER_COMPANY:COMPANY_ID:TPP_COMPANY)
 */
class User extends AEntity
{
}

