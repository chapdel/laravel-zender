<?php
// config for Chapdel/Zender
return [
    // default Gateway
    "default" => env("SMS_DRIVER", "clicksend"),
    "from" => env("SMS_FROM", null),
    "drivers" => [
        "clicksend" => [
            "username" => env("CLICKSEND_USERNAME", null),
            "password" => env("CLICKSEND_PASSWORD", null),
        ]
    ]
];
