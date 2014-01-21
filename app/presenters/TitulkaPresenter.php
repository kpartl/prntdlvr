<?php

use Nette\Application\UI\Form;

//require 'Nette/loader.php';
//require 'Authenticator.php';
/**
 * Titulka presenter.
 */
class TitulkaPresenter extends BasePresenter {

    /** @var Nette\Database\Context */
    private $database;
    private $grid;

    public function __construct(\Nette\Database\Connection $database) {
        $this->database = $database;
    }

    protected function startup() {
        parent::startup();

        if (!$this->user->isLoggedIn()) {
            if ($this->user->logoutReason === Nette\Http\UserStorage::INACTIVITY) {
                $this->flashMessage('Byl jste odhlášen z důvodu nečinnosti. Přihlašte se znovu.');
            }
            $this->redirect('Sign:in', array('backlink' => $this->storeRequest()));
        }
    }

    public function renderDefault() {

       // $this->template->spolecnosti = $this->database->table('Spolecnost')->order('nazev DESC');
               
        
    }

    public function createComponentDatagridSpools() {
        $grid = new Nextras\Datagrid\Datagrid;
        $grid->addColumn('ID');
        $grid->addColumn('Nazev', 'Nazev')->enableSort();
        //$grid->setDatasourceCallback($this->getDatasourceSpolecnosti());
        $grid->setDatasourceCallback(function($filter, $order) {
            $filters = array();
            foreach ($filter as $k => $v) {
                if ($k == 'ID' || is_array($v))
                    $filters[$k] = $v;
                else
                    $filters[$k . ' LIKE ?'] = "%$v%";
            }

            $selection = $this->database->table('Spolecnost')->where($filters);
            if ($order[0])
                $selection->order(implode(' ', $order));

            return $selection;
        });
        $grid->addCellsTemplate(__DIR__ . '/../templates/Titulka/datagridSpolecnosti.latte');
		
        return $grid;
    }

    public function getDatasourceSpolecnosti() {
        $selection = $this->database->table('Spolecnost');


        return $selection;
    }

}
