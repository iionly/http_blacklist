<?php

return [
	'actions' => [
		'http_blacklist/reset' => [
			'access' => 'admin',
		],
	],
	'settings' => [
		'httpblmaxdays' => 21,
		'httpblmaxthreat' => 25,
		'counter' => 0,
	],
	'hooks' => [
		'route:rewrite' => [
			'register' => [
				'\Elgg\HttpBlacklist\RouterHttpBlacklist\RouterHttpBlacklist::class' => [
					'priority' => 100,
				],
			],
			'login' => [
				'\Elgg\HttpBlacklist\RouterHttpBlacklist\RouterHttpBlacklist::class' => [
					'priority' => 101,
				],
			],
			'forgotpassword' => [
				'\Elgg\HttpBlacklist\RouterHttpBlacklist\RouterHttpBlacklist::class' => [
					'priority' => 102,
				],
			],
		],
	],
];
