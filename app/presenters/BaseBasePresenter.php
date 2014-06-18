<?php

namespace Base;

use Model;
use Nette;
use Nette\Image;

/**
 * Base presenter for all application presenters.
 */
abstract class BaseBasePresenter extends Nette\Application\UI\Presenter {

	/** @var \Model\Repository\DocTypeRepository @inject */
	public $docTypeRepository;

	/** @var \Model\Repository\DocumentRepository @inject */
	public $documentRepository;

	/** @var \Model\Repository\OperatorRepository @inject */
	public $operatorRepository;

	/** @var \Model\Repository\DistChannelRepository @inject */
	public $distChannelRepository;

	/** @var \Model\Repository\CompanyRepository @inject */
	public $companyRepository;

	/** @var \Model\Repository\UserRepository @inject */
	public $userRepository;

	/** @var \Model\Repository\StatusTypeRepository @inject */
	public $statusTypeRepository;
	
		/** @var \Model\Repository\StatusRepository @inject */
	public $statusRepository;

	/** @var \LeanMapper\IMapper @inject */
	public $mapper;
	
	public static $settings = array(
		'dataSourceLimit' => 100,
		'roles' => array(
			1 => 'Administrátor',
			2 => 'Operátor',
			3 => 'Uživatel',
		)
	);
	

	public function startup() {
		parent::startup();
		if (!$this->user->isLoggedIn()) {
			if ($this->user->getLogoutReason() === Nette\Security\User::INACTIVITY) {
				$this->flashMessage('Byl/a jste odhlášen/a kvůli neaktivitě.', 'alert-error');
			}

			$this->redirect(':Auth:Sign:in', array('backlink' => $this->storeRequest()));
		} else {
//			if (!$this->user->isAllowed($this->name, $this->action)) {
//				$this->flashMessage('Přístup zamítnut!', 'alert-error');
//				//$this->redirect(':Auth:Sign:in');
//			}
			//$this->redirect(':Front:Status:default');
		}
	}

	public function beforeRender() {
		parent::beforeRender();
	}

}
