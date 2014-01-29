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
	public $entity;

	public function renderDefault($id) {
		$entity = $this->documentRepository->find($id);
		$this->entity = $entity;
		$this->template->documentEntity = $entity;		
	}

	public function createComponentNoticeForm() {
		$form = new Nette\Application\UI\Form;
		$form->addText('noticeInput');
		$form->addButton('noticeChangeButton');
		$form->addSubmit('submittButton')->setAttribute('value', 'OK'); //->setAttribute('class', 'ajax hide');
		$form->addSubmit('cancelButton')->setAttribute('value', 'Zrušit'); //->setAttribute('class', 'ajax hide');
		$form->onSuccess[] = $this->noticesFormSucceeded;
		return $form;
	}

	public function noticesFormSucceeded($form) {
		if ($form['submittButton']->isSubmittedBy()) {
			$entity = $this->documentRepository->find($this->getParam('id'));
			$entity->__set('docNote', $form->values->noticeInput);
			$this->documentRepository->persist($entity);
		}
		$this->redirect('this');
	}

}
