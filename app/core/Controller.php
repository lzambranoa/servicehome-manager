<?php

class Controller
{
    public function view($ruta, $datos = [])
    {
        extract($datos);

        require_once "../app/views/$ruta.php";
    }
}