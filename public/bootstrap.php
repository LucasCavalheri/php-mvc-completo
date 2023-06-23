<?php

session_start();

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use app\core\AppExtract;
use app\core\MyApp;

$myApp = new MyApp(new AppExtract);
$myApp->controller();
$myApp->view();
