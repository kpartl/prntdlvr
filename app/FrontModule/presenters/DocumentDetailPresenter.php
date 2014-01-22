<?php

namespace App\FrontModule;

use Model;
use Nette;

/**
 * Class DocumentDetailPresenter
 * @package App\FrontModule
 */
class DocumentDetailPresenter extends BasePresenter {
	
	/** @var \Model\Repository\DocumentRepository @inject */
	public $documentRepository;	
	
		
	public function renderDefault($id) {		
		$entity = $this->documentRepository->find($id);
		$this->template->documentEntity = $entity;		
	}

}
