<?php
namespace Eggbe\LaravelDelegapiClient;

use \Eggbe\DelegapiClient\Client;

class LaravelDelegapiClient extends Client {

	/**
	 * @param array $Config
	 * @throws \Exception
	 */
	public function __construct(array $Config) {
		parent::__construct($Config);
	}

}
