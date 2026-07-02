<?php

class Controller
{
    public function view($vista, $datos = [])
    {
        extract($datos);

        $contenido = "../app/views/" . $vista . ".php";

        require_once "../app/views/layouts/master.php";
    }
}