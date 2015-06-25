<?php
namespace Eggbe\LaravelDelegapiClient;

use \Eggbe\DelegapiClient\Client;

class LaravelDelegapiClient {

	/**
	 * @var array
	 */
	public static $Config = [];

	/**
	 * @var Client
	 */
	private static $Client = null;

	/**
	 * @param string $name
	 * @param array $Args
	 * @return Client
	 */
	public static function __callStatic($name, array $Args = []){
		if (is_null(self::$Client)){
			self::$Client = new Client(self::$Config);
		}

		self::$Client->{$name}();
		return self::$Client;
	}

}
