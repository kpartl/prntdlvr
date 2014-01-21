<?php

namespace App\FrontModule;

use Model;
use Nette;

/**
 * Class StatusDetailPresenter
 * @package App\FrontModule
 */
class StatusDetailPresenter extends BasePresenter {
	
	/** @var \Model\Repository\StatusRepository @inject */
	public $statusRepository;	
	
		
	public function renderDefault($id) {		
		$statusEntity = $this->statusRepository->find($id);
		$this->template->statusEntity = $statusEntity;
		//$this['statusForm']->setDefaults(array('id_spool' => $this->$id_spool));
	}

}
