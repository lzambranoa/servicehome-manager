<?php

require_once "../app/models/Tecnico.php";

class TecnicosController extends Controller
{
    private $tecnicoModel;

    public function __construct()
    {
        $this->tecnicoModel = new Tecnico();
    }

    // Método que obtiene todos los técnicos y los pasa a la vista index
    public function index()
    {
        // Array con el título de la página y los datos de los técnicos
        $datos = [
            "titulo" => "Gestión de Técnicos",
            "tecnicos" => $this->tecnicoModel->obtenerTodos()
        ];

        // Renderiza la vista con los datos obtenidos
        $this->view("tecnicos/index", $datos);
    }


    // Método que muestra el formulario para crear un nuevo técnico
    public function create()
    {
        $datos = [
            "titulo" => "Nuevo Técnico"
        ];

        $this->view("tecnicos/create", $datos);
    }


    // Método que guarda un nuevo técnico en la base de datos
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            $this->redirect("tecnicos");

        }

        $datos = [

            "nombre" => trim($_POST['nombre']),
            "documento" => trim($_POST['documento']),
            "telefono" => trim($_POST['telefono']),
            "correo" => trim($_POST['correo']),
            "especialidad" => trim($_POST['especialidad'])

        ];

        if ($this->tecnicoModel->existeDocumento($datos["documento"])) {

            $this->redirectWithMessage(

                "tecnicos/create",

                "warning",

                "El documento ya se encuentra registrado."

            );

        }

        if ($this->tecnicoModel->existeCorreo($datos["correo"])) {

            $this->redirectWithMessage(

                "tecnicos/create",

                "warning",

                "El correo ya se encuentra registrado."

            );

        }

        if ($this->tecnicoModel->guardar($datos)) {

            $this->redirectWithMessage(

                "tecnicos",

                "success",

                "Técnico registrado correctamente."

            );

        }

        $this->redirectWithMessage(

            "tecnicos",

            "danger",

            "Ocurrió un error al registrar el técnico."

        );

    }
    public function edit($id)
    {

        $datos = [

            "titulo" => "Editar Técnico",

            "tecnico" => $this->tecnicoModel->obtenerPorId($id)

        ];

        $this->view("tecnicos/edit", $datos);

    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->redirect("tecnicos");
        }

        $datos = [

            "id_tecnico" => $_POST["id_tecnico"],
            "nombre" => trim($_POST["nombre"]),
            "documento" => trim($_POST["documento"]),
            "telefono" => trim($_POST["telefono"]),
            "correo" => trim($_POST["correo"]),
            "especialidad" => trim($_POST["especialidad"]),
            "estado" => trim($_POST["estado"])

        ];

        if ($this->tecnicoModel->actualizar($datos)) {

            $this->redirectWithMessage(
                "tecnicos",
                "success",
                "Técnico actualizado correctamente."
            );

        }

        $this->redirectWithMessage(
            "tecnicos",
            "danger",
            "No fue posible actualizar el técnico."
        );
    }

    public function delete($id)
    {
        if ($this->tecnicoModel->eliminar($id)) {

            $this->redirectWithMessage(

                "tecnicos",

                "success",

                "Técnico eliminado correctamente."

            );

        }

        $this->redirectWithMessage(

            "tecnicos",

            "danger",

            "No fue posible eliminar el técnico."

        );
    }
}

