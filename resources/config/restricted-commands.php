<?php

return [
	'environments' => [
		'production',
		'staging',
	],
	'commands' => [
		'key:generate',
		'migrate:fresh',
		'migrate:refresh',
		'migrate:reset',
		'db:seed',
		'db:wipe',
		'passport:client',
		'passport:keys',
		'optimize:clear',
		'cache:clear',
		'test',
	],
];
