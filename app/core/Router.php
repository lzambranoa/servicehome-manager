<?php

class Router
{
    public function cargarRuta()
    {
        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');

            $url = explode('/', $url);

        } else {

            $url = ['dashboard'];

        }

        return $url;
    }
}