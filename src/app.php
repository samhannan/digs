<?php
require __DIR__.'/../config/database.php';

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new Silex\Provider\AssetServiceProvider());

$capsule = new Capsule;
$capsule->addConnection($database);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();

return $app;