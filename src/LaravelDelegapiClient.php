<?php
namespace Eggbe\LaravelDelegapiClient;

use \Eggbe\Helper\Arr;

use \Eggbe\DelegapiClient\Client;
use \Eggbe\DelegapiClient\Parser\Abstracts\AParser;
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
		parent::__construct($Config['url'], Arr::cast(Arr::get($Config, 'arguments', [])));

		if (array_key_exists('wrapper', $Config)) {
			if (!is_callable($Config['wrapper'])) {
				throw new \Exception('Invalid wrapper!');
			}

			$this->registerWrapper($Config['wrapper']);
		}

		if (array_key_exists('parser', $Config)) {
			if (!is_string($Config['parser']) || !class_exists($Config['parser'])){
				throw new \Exception('Undefined parser class!');
			}

			if (!is_subclass_of($Config['parser'], AParser::class)) {
				throw new \Exception('Assigned parser class is not subclass of ' . AParser::class . '!');
			}

			$this->registerParser(new $Config['parser']());
		}

		if (array_key_exists('watch', $Config)) {
			foreach ((array)$Config['watch'] as $Wacher) {
				if (!is_string($Wacher) || !class_exists($Wacher)) {
					throw new \Exception('Undefined watcher class ' .  $Wacher . '!');
				}

				if (!is_subclass_of($Wacher, AWatcher::class)){
					throw new \Exception('Assigned watcher class is not subclass of ' . AWatcher::class . '!');
				}

				$this->addWatcher(new $Wacher());
			}
		}

	}

}
