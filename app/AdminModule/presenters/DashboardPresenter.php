<?php
namespace App\AdminModule;
use Nette\Application\UI\Form;
use Nette;


class DashboardPresenter extends Nette\Application\UI\Presenter
{
	/** @var AlbumRepository */
	private $albums;


	public function __construct()
	{
		//$this->albums = $albums;
	}


	protected function startup()
	{
		parent::startup();

		
	}


	/********************* view default *********************/


	public function renderDefault()
	{
		$form = $this['albumForm'];
		//$this->template->albums = $this->albums->findAll()->order('artist')->order('title');
	}


	/********************* views add & edit *********************/


	public function renderAdd()
	{
		$this['albumForm']['save']->caption = 'Add';
	}


	public function renderEdit($id = 0)
	{
		$form = $this['albumForm'];
		if (!$form->isSubmitted()) {
//			$album = $this->albums->findById($id);
//			if (!$album) {
//				$this->error('Record not found');
//			}
//			$form->setDefaults($album);
		}
	}


	/********************* view delete *********************/


	


	/********************* component factories *********************/


	/**
	 * Edit form factory.
	 * @return Form
	 */
	protected function createComponentAlbumForm()
	{
		$form = new Form;
		$form->addText('artist', 'Artist:')
			->setRequired('Please enter an artist.');

		$form->addText('title', 'Title:')
			->setRequired('Please enter a title.');

		$form->addSubmit('save', 'Save')
			->setAttribute('class', 'default')
			->onClick[] = $this->albumFormSucceeded;

		$form->addSubmit('cancel', 'Cancel')
			->setValidationScope(FALSE)
			->onClick[] = $this->formCancelled;

		$form->addProtection();
		return $form;
	}


	public function albumFormSucceeded($button)
	{
		$values = $button->getForm()->getValues();
		$id = (int) $this->getParameter('id');
		if ($id) {
			$this->albums->findById($id)->update($values);
			$this->flashMessage('The album has been updated.');
		} else {
			$this->albums->insert($values);
			$this->flashMessage('The album has been added.');
		}
		$this->redirect('default');
	}


	/**
	 * Delete form factory.
	 * @return Form
	 */
	protected function createComponentDeleteForm()
	{
		$form = new Form;
		$form->addSubmit('cancel', 'Cancel')
			->onClick[] = $this->formCancelled;

		$form->addSubmit('delete', 'Delete')
			->setAttribute('class', 'default')
			->onClick[] = $this->deleteFormSucceeded;

		$form->addProtection();
		return $form;
	}


	public function deleteFormSucceeded()
	{
		$this->albums->findById($this->getParameter('id'))->delete();
		$this->flashMessage('Album has been deleted.');
		$this->redirect('default');
	}


	public function formCancelled()
	{
		$this->redirect('default');
	}

}
