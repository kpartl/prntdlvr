<?php

namespace Model;

use Nette;
use Nette\Utils\Strings;

/**
 * Class Authenticator
 * @package Model
 */
class Authenticator extends Nette\Object implements Nette\Security\IAuthenticator {

	/** @var \Model\Repository\UserRepository @inject */
	public $userRepository;
	
	
	
	function __construct( \Model\Repository\UserRepository $userRepository){
        $this->userRepository = $userRepository;		
    }
	
//	public function setUserRepository($userRepository){
//		$this->userRepository = $userRepository;
//	}
		
	/**
	 * Performs an authentication.
	 * @param array $credentials
	 * @return Nette\Security\Identity|Nette\Security\IIdentity
	 * @throws \Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials) {
		list($username, $password) = $credentials;
		
		
		$userEntity = $this->userRepository->findByUsername($username);		

		if (!$userEntity) {			
			throw new Nette\Security\AuthenticationException('Neplatné uživatelské jméno.', self::IDENTITY_NOT_FOUND);
		}
		
		if ($userEntity->password !== $this->calculateHash($password, $userEntity->password)) {
			
			throw new Nette\Security\AuthenticationException('Neplatné heslo.', self::INVALID_CREDENTIAL);
		}

		//$result = $row->toArray();
		//unset($result['password']);
		$userEntity->password = '';
		//dump($userEntity->getRowData());
		$userRowData=$userEntity->getRowData();
		$role = \Model\Settings::$roles[$userRowData['ROLE']];
		
		return new Nette\Security\Identity($userEntity->username,array($role), $userRowData);
	}

	/**
	 * Computes salted password hash.
	 * @param $password
	 * @param null $salt
	 * @return string
	 */
	public static function calculateHash($password, $salt = NULL) {
		if ($password === Strings::upper($password)) { // perhaps caps lock is on
			$password = Strings::lower($password);
		}
		return crypt($password, $salt ? : '$2a$07$' . Strings::random(22));
	}

}
