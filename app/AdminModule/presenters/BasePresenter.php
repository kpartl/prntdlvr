<?php

namespace App\AdminModule;

use Model;
use Nette;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Base\BaseBasePresenter {

	public function startup() {
		parent::startup();
		if (!$this->user->isInRole('admin')) {			
				$this->flashMessage('Nemáte oprávnění přístupu na požadovanou stránku.', 'alert-error');
			
				$this->redirect(':Auth:Sign:in', array('backlink' => $this->storeRequest()));
		}
	}

	public function getCiselnik($repository) {
		$values = $repository->findAll();
		$resultArray = array();
		foreach ($values as $v) {
			$resultArray[($v->id)] = $v->name;
		}

		return $resultArray;
	}

}
