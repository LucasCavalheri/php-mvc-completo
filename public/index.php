<?php

use app\core\AppExtract;

session_start();

require '../vendor/autoload.php';

$app = new AppExtract;
$app->controller();
$method = $app->method();

var_dump($method);