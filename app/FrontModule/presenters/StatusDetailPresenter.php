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
	
		
	public function renderDefault($id_spool) {	
		
		$id_company = $this->getSession()->getSection("StatusPresenter")->company_id;
		$this->getSession()->getSection("StatusPresenter")->spool_id=$id_spool;
		$this->template->id_spool = $id_spool;
		$this->template->id_company = $id_company;
		$statusEntity = $this->statusRepository->findByCompanyAndSpool($id_company,$id_spool );
		
		$this->template->statusEntity = $statusEntity;
		//$this['statusForm']->setDefaults(array('id_spool' => $this->$id_spool));
	}

}
