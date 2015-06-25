<?php
namespace Eggbe\LaravelDelegapiClient;

use \Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\Config;

use \Eggbe\DelegapiClient\Client;

class LaravelDelegapiClientServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register bindings in the container.
	 * @return void
	 */
	public function register() {
		$this->package('eggbe/delegapi-client');
		LaravelDelegapiClient::$Config = Config::get('delegapi-client::config');
	}

}
