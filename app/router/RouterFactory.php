<?php

use Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();
		
		$router[] = new Route('auth/<action>[/<id>]', array(
			'module' => 'Auth',
			'presenter' => 'Sign',
			'action' => 'in',
		)); 
		$router[] = new Route('<presenter>/<action>[/<id>]', array(
			'module' => 'Front',
			'presenter' => 'Status',
			'action' => 'default',
		)); 
		return $router;
	}

}
