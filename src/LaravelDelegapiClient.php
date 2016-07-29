<?php
namespace Eggbe\LaravelDelegapiClient;

use \Eggbe\DelegapiClient\Client;
use \Eggbe\DelegapiClient\Watcher\Abstracts\AWatcher;

class LaravelDelegapiClient extends Client {

	/**
	 * @param array $Config
	 * @throws \Exception
	 */
	public function __construct(array $Config) {
		if (!array_key_exists('url', $Config = array_change_key_case($Config, CASE_LOWER))) {
			throw new \Exception('Undefined url!');
		}

		if (!array_key_exists('token', $Config)) {
			throw new \Exception('Undefined token!');
		}

		if (array_key_exists('wrapper', $Config)) {
			if (!is_callable($Config['wrapper'])) {
				throw new \Exception('Invalid wrapper!');
			}

			$this->addWrapper($Config['wrapper']);
		}

		if (array_key_exists('watch', $Config)) {
			foreach ((array)$Config['watch'] as $Wacher) {
				if (!class_exists($Wacher)) {
					throw new \Exception('Unknown watcher class ' .  $Wacher . '!');
				}

				if (!is_subclass_of($Wacher, AWatcher::class)){
					throw new \Exception('Watcher class ' .  $Wacher . ' is not subclass of ' . AWatcher::class . '!');
				}

				$this->addWatcher(new $Wacher());
			}
		}

		parent::__construct($Config['url'], $Config['token']);
	}

}
