<?php

require_once "../app/models/Tecnico.php";
require_once "../app/models/Servicio.php";

class DashboardController extends Controller
{
    private $tecnicoModel;
    private $servicioModel;

    public function __construct()
    {
        $this->tecnicoModel = new Tecnico();
        $this->servicioModel = new Servicio();
    }

    public function index()
    {
        $datos = [

            "titulo" => "Dashboard",

            "totalTecnicos" => $this->tecnicoModel->totalTecnicos(),

            "totalServicios" => $this->servicioModel->totalServicios(),

            "pendientes" => $this->servicioModel->totalPendientes(),

            "finalizados" => $this->servicioModel->totalFinalizados(),

            "ultimosServicios" => $this->servicioModel->obtenerUltimos()

        ];

        $this->view("dashboard/index",$datos);
    }
}