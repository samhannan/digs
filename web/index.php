<?php

ini_set('display_errors', 0);
$debug = false;

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
	$debug = true;
}

if($debug === true) {
	define('DEBUG', true);
	ini_set('display_errors', 1);
}

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/prod.php';

require __DIR__.'/../src/services.php';
require __DIR__.'/../src/models.php';
require __DIR__.'/../src/controllers.php';
require __DIR__.'/../config/routes.php';

$app->run();
