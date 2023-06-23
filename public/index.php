<?php

use app\core\AppExtract;

session_start();

require '../vendor/autoload.php';

$app = new AppExtract;
$controller = $app->controller();

var_dump($controller);