<?php

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
		$router[] = new Route('<presenter>/<action>', 'Homepage:default');
                //$router[] = new Route("127.0.0.1/marauders/www/homepage/send", 'Homepage:receiveData');
		return $router;
	}
}
