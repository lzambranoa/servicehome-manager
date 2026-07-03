<?php

class DashboardController extends Controller
{

    public function index()
{
    require_once "../app/models/Tecnico.php";

    $tecnico = new Tecnico();

    $datos = [

        "titulo" => "Dashboard",

        "totalTecnicos" => $tecnico->totalTecnicos(),

        "totalServicios" => 0,

        "pendientes" => 0,

        "finalizados" => 0

    ];

    $this->view("dashboard/index", $datos);
}

}