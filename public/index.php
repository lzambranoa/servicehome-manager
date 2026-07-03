<?php

require_once '../config/config.php';

require_once '../app/core/Database.php';
require_once '../app/core/Model.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Router.php';
require_once '../app/core/Session.php';


session_start();

$router = new Router();

$router->cargarRuta();