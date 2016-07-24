<?php
namespace Eggbe\LaravelDelegapiClient;

use \Illuminate\Support\Facades\Facade;

class LaravelDelegapiClientFacade extends Facade {

	/**
	 * Get the binding in the IoC container
	 * @return string
	 */
	public final static function getFacadeAccessor() {
		return 'DelegapiClient';
	}

}
