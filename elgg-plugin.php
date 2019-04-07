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
];
