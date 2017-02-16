<?php
use \Eggbe\Helper\Arr;

use \Eggbe\DelegapiClient\Parser\Json;
use \Eggbe\DelegapiClient\Watcher\Time;

return [

	'url' => null,

	'parser' => Json::class,

	'arguments' => [
		'referer' => Arr::get($_SERVER, 'HTTP_HOST', null),
	],

	'wrapper' => function($source){
		return $source;
	},

	'watch' => [
		Time::class,
	],

];
