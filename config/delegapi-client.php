<?php
use \Eggbe\DelegapiClient\Watcher\Time;
use \Eggbe\DelegapiClient\Watcher\Referer;

return [

	'url' => null,
	'token'=> null,

	'wrapper' => function($source){
		return json_decode($source, true);
	},

	'watch' => [
		Referer::class,
		Time::class,
	],

];
