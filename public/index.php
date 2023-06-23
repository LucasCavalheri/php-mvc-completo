<?php

use app\core\AppExtract;

session_start();

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$app = new AppExtract;
$controller = $app->controller();
$method = $app->method();
$params = $app->params();

$controller = new $controller;
$controller->$method($params);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($controller->data)) {
        throw new \Exception('Controller precisa ter uma propriedade $data');
    }

    if (!array_key_exists('title', $controller->data)) {
        throw new \Exception('A propriedade $data precisa ter uma chave chamada title');
    }

    $viewsPath = '../app/views/';
    extract($controller->data);
    require '../app/views/index.php';
}
