<?php

namespace Base;

use Model;
use Nette;
use Nette\Image;

/**
 * Base presenter for all application presenters.
 */
abstract class BaseBasePresenter extends Nette\Application\UI\Presenter {
	/**
	 * @return \WebLoader\Nette\CssLoader
	 */
	public function createComponentCss() {
//		$files = new \WebLoader\FileCollection(WWW_DIR . '/css');
//		$files->addFiles(array(
//			'bootstrap.min.css',
//			'screen.less',
//		));
//		$compiler = \WebLoader\Compiler::createCssCompiler($files, WWW_DIR . '/webtemp');
//		//$compiler->setOutputNamingConvention(\ZeminemOutputNamingConvention::createCssConvention());
//		$compiler->addFileFilter(new \Webloader\Filter\LessFilter());
//		return new \WebLoader\Nette\CssLoader($compiler, $this->template->basePath . '/webtemp');
	}
}