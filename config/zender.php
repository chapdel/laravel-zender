<?php
// config for Chapdel/Zender
return [
	// default Gateway
	"default" => env("SMS_DRIVER", "clicksend"),
	"drivers" => [
		"clicksend" => [
			"username" => env("CLICKSEND_USERNAME"),
			"password" => env("CLICKSEND_PASSWORD"),
		]
	]
];
