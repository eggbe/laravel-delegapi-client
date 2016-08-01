<?php
namespace Eggbe\LaravelDelegapiClient;

use \Illuminate\Support\Facades\Facade;

class LaravelDelegapiClientFacade extends Facade {

	/**
	 * Get the binding in the IoC container
	 * @return string
	 */
	public final static function getFacadeAccessor() {

		/**
		 * Facade is very simple to use but it can provide a real troubles
		 * if we want have a new instance of related object every time instead a singleton.
		 */
		unset(static::$resolvedInstance['DelegapiClient']);
		return 'DelegapiClient';
	}

}
