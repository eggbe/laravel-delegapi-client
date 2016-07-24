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
		$this->mergeConfigFrom(dirname(__DIR__) . '/config/delegapi-client.php', 'delegapi-client');
		$this->app->singleton('DelegapiClient', function () {
			return new Client(Config::get('delegapi-client'));
		});
	}

	/**
	 * Register the publishes.
	 */
	public final function boot() {
		$this->publishes([
			dirname(__DIR__) . '/config/delegapi-client.php' => config_path('delegapi-client.php'),
		]);
	}

}
