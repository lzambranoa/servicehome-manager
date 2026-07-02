<?php

class Router
{
    public function cargarRuta()
{
    if (isset($_GET['url'])) {

        $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

    } else {

        $url = ['dashboard'];

    }

    $controlador = ucfirst($url[0]) . "Controller";

    $archivo = "../app/controllers/" . $controlador . ".php";

    if (file_exists($archivo)) {

        require_once $archivo;

        $controller = new $controlador();

        if (isset($url[1])) {

            $metodo = $url[1];

        } else {

            $metodo = "index";

        }

        $controller->$metodo();

    } else {

        die("Controlador no encontrado.");

    }

}
}