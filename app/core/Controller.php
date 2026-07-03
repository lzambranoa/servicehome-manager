<?php

class Controller
{
    public function view($vista, $datos = [])
    {
        extract($datos);

        $contenido = "../app/views/" . $vista . ".php";

        require_once "../app/views/layouts/master.php";
    }

    /**
     * Redirecciona sin mensaje.
     */
    protected function redirect($ruta)
    {
        Session::redirect($ruta);
    }

    /**
     * Redirecciona mostrando un mensaje.
     */
    protected function redirectWithMessage($ruta, $tipo, $mensaje)
    {
        Session::redirectWithMessage($ruta, $tipo, $mensaje);
    }

    
}