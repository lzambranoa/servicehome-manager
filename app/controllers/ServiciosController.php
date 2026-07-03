<?php

require_once "../app/models/Servicio.php";

class ServiciosController extends Controller
{
    private $servicioModel;

    public function __construct()
    {
        $this->servicioModel = new Servicio();
    }

    /**
     * Listado de servicios
     */
    public function index()
    {
        $datos = [
            "titulo" => "Gestión de Servicios",
            "servicios" => $this->servicioModel->obtenerTodos()
        ];

        $this->view("servicios/index", $datos);
    }

    /**
     * Formulario nuevo servicio
     */
    public function create()
    {
        $datos = [
            "titulo" => "Nuevo Servicio",
            "tecnicos" => $this->servicioModel->obtenerTecnicos()
        ];

        $this->view("servicios/create", $datos);
    }

    /**
     * Guardar servicio
     */
    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $this->redirect("servicios");
        }

        $datos = [

            "cliente" => trim($_POST["cliente"]),
            "telefono_cliente" => trim($_POST["telefono_cliente"]),
            "correo_cliente" => trim($_POST["correo_cliente"]),
            "direccion" => trim($_POST["direccion"]),
            "tipo_servicio" => trim($_POST["tipo_servicio"]),
            "descripcion" => trim($_POST["descripcion"]),
            "fecha_programada" => $_POST["fecha_programada"],
            "estado" => $_POST["estado"],
            "id_tecnico" => empty($_POST["id_tecnico"]) ? null : $_POST["id_tecnico"]

        ];

        if ($this->servicioModel->guardar($datos)) {

            $this->redirectWithMessage(
                "servicios",
                "success",
                "Servicio registrado correctamente."
            );

        }

        $this->redirectWithMessage(
            "servicios",
            "danger",
            "No fue posible registrar el servicio."
        );
    }

    /**
     * Editar servicio
     */
    public function edit($id)
    {
        $datos = [

            "titulo" => "Editar Servicio",

            "servicio" => $this->servicioModel->obtenerPorId($id),

            "tecnicos" => $this->servicioModel->obtenerTecnicos()

        ];

        $this->view("servicios/edit", $datos);
    }

    /**
     * Actualizar servicio
     */
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $this->redirect("servicios");

        }

        $datos = [

            "id_servicio" => $_POST["id_servicio"],
            "cliente" => trim($_POST["cliente"]),
            "telefono_cliente" => trim($_POST["telefono_cliente"]),
            "correo_cliente" => trim($_POST["correo_cliente"]),
            "direccion" => trim($_POST["direccion"]),
            "tipo_servicio" => trim($_POST["tipo_servicio"]),
            "descripcion" => trim($_POST["descripcion"]),
            "fecha_programada" => $_POST["fecha_programada"],
            "estado" => $_POST["estado"],
            "id_tecnico" => empty($_POST["id_tecnico"]) ? null : $_POST["id_tecnico"]

        ];

        if ($this->servicioModel->actualizar($datos)) {

            $this->redirectWithMessage(
                "servicios",
                "success",
                "Servicio actualizado correctamente."
            );

        }

        $this->redirectWithMessage(
            "servicios",
            "danger",
            "No fue posible actualizar el servicio."
        );
    }

    /**
     * Eliminar servicio
     */
    public function delete($id)
    {
        if ($this->servicioModel->eliminar($id)) {

            $this->redirectWithMessage(
                "servicios",
                "success",
                "Servicio eliminado correctamente."
            );

        }

        $this->redirectWithMessage(
            "servicios",
            "danger",
            "No fue posible eliminar el servicio."
        );
    }

}