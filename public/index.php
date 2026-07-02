<?php

require_once '../config/config.php';

require_once '../app/core/Database.php';
require_once '../app/core/Model.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Router.php';

$router = new Router();

$url = $router->cargarRuta();

echo "<pre>";

print_r($url);

echo "</pre>";