<?php

session_start();

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->allowQuit(false);
$whoops->writeToOutput(false);
$whoops->register();

use app\core\AppExtract;
use app\core\MyApp;

try {
    $myApp = new MyApp(new AppExtract);
    $myApp->controller();
    $myApp->view();
} catch (\Throwable $th) {
    $html = $whoops->handleException($th);
    echo $html;
}
