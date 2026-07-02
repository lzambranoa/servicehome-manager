<?php

class DashboardController extends Controller
{

    public function index()
    {
        $datos = [

            "titulo" => "Dashboard"

        ];

        $this->view("dashboard/index", $datos);

    }

}