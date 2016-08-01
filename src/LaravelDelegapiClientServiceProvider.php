<?php
namespace Eggbe\LaravelDelegapiClient;

use \Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\Config;

use \Eggbe\LaravelDelegapiClient\LaravelDelegapiClient;

class LaravelDelegapiClientServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register bindings in the container.
	 */
	public function register() {
		$this->mergeConfigFrom(dirname(__DIR__) . '/config/delegapi-client.php', 'eggbe.delegapi-client');
		$this->app->bind('DelegapiClient', function () {
			return new LaravelDelegapiClient(Config::get('eggbe.delegapi-client'));
		});
	}

	/**
	 * Register the publishes.
	 */
	public final function boot() {
		$this->publishes([
			dirname(__DIR__) . '/config/delegapi-client.php' => config_path('eggbe/delegapi-client.php'),
		]);
	}

}
