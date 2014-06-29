<?php

namespace App\FrontModule;

use Model;
use Nette;
use Nextras;
use \Nette\Forms\Container;

Container::extensionMethod('addDatePicker', function (Container $container, $name, $label = NULL) {
	return $container[$name] = new \JanTvrdik\Components\DatePicker($label);
});

/**
 * Class DatePickerBasePresenter
 * @package App\FrontModule
 */
abstract class DatePickerBasePresenter extends BasePresenter {

	public function createComponentDatePicker() {
		//$form = new \Nella\Forms\Container;
		$form = new Nette\Application\UI\Form;

		$date_to = StrFTime("%d-%m-%Y %H:%M:%S", Time());
		$date_from = StrFTime("%d-%m-%Y %H:%M:%S", strToTime("-1 month", strtotime("now")));

		$form->addDatePicker('from')->setValue($date_from);
		$form->addDatePicker('to')->setValue($date_to);
		$form->addSubmit('submittButton')->setAttribute('value', 'OK');

		$form->onSuccess[] = $this->datePickerFormSucceeded;

		return $form;
	}

	public abstract function datePickerFormSucceeded($form);

	public function getColumName($propertyName) {
		return $propertyName;
	}

	public function getDates() {
		$dateFormat= 'Y-m-d';
		//$dateFormat= 'd-m-Y';
		$date_from = $this['datePicker']['from']->getValue()->format($dateFormat);
		$date_to = $this['datePicker']['to']->getValue()->format($dateFormat);
		$date_from = $date_from . ' 0:00:00';
		$date_to = $date_to . ' 23:59:59';

		return array('date_from' => $date_from, 'date_to' => $date_to);
	}

}
