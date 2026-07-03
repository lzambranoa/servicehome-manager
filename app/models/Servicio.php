<?php

class Servicio extends Model
{
    /**
     * Obtiene todos los servicios junto con el nombre del técnico.
     */
    public function obtenerTodos()
    {
        $sql = "SELECT
                    s.id_servicio,
                    s.cliente,
                    s.telefono_cliente,
                    s.tipo_servicio,
                    s.estado,
                    s.fecha_programada,
                    t.nombre AS tecnico
                FROM servicios s
                LEFT JOIN tecnicos t
                    ON s.id_tecnico = t.id_tecnico
                ORDER BY s.id_servicio DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lista técnicos activos para el SELECT.
     */
    public function obtenerTecnicos()
    {
        $sql = "SELECT
                    id_tecnico,
                    nombre
                FROM tecnicos
                WHERE estado='Activo'
                ORDER BY nombre";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Guarda un nuevo servicio.
     */
    public function guardar($datos)
    {
        $sql = "INSERT INTO servicios
                (
                    cliente,
                    telefono_cliente,
                    correo_cliente,
                    direccion,
                    tipo_servicio,
                    descripcion,
                    fecha_programada,
                    estado,
                    id_tecnico
                )
                VALUES
                (
                    :cliente,
                    :telefono_cliente,
                    :correo_cliente,
                    :direccion,
                    :tipo_servicio,
                    :descripcion,
                    :fecha_programada,
                    :estado,
                    :id_tecnico
                )";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([

            ":cliente"=>$datos["cliente"],
            ":telefono_cliente"=>$datos["telefono_cliente"],
            ":correo_cliente"=>$datos["correo_cliente"],
            ":direccion"=>$datos["direccion"],
            ":tipo_servicio"=>$datos["tipo_servicio"],
            ":descripcion"=>$datos["descripcion"],
            ":fecha_programada"=>$datos["fecha_programada"],
            ":estado"=>$datos["estado"],
            ":id_tecnico"=>$datos["id_tecnico"]

        ]);
    }

    /**
     * Obtiene un servicio por ID.
     */
    public function obtenerPorId($id)
    {
        $sql = "SELECT *
                FROM servicios
                WHERE id_servicio=:id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([

            ":id"=>$id

        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Actualiza un servicio.
     */
    public function actualizar($datos)
    {
        $sql="UPDATE servicios SET

                cliente=:cliente,
                telefono_cliente=:telefono_cliente,
                correo_cliente=:correo_cliente,
                direccion=:direccion,
                tipo_servicio=:tipo_servicio,
                descripcion=:descripcion,
                fecha_programada=:fecha_programada,
                estado=:estado,
                id_tecnico=:id_tecnico

              WHERE id_servicio=:id_servicio";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([

            ":cliente"=>$datos["cliente"],
            ":telefono_cliente"=>$datos["telefono_cliente"],
            ":correo_cliente"=>$datos["correo_cliente"],
            ":direccion"=>$datos["direccion"],
            ":tipo_servicio"=>$datos["tipo_servicio"],
            ":descripcion"=>$datos["descripcion"],
            ":fecha_programada"=>$datos["fecha_programada"],
            ":estado"=>$datos["estado"],
            ":id_tecnico"=>$datos["id_tecnico"],
            ":id_servicio"=>$datos["id_servicio"]

        ]);
    }

    /**
     * Elimina un servicio.
     */
    public function eliminar($id)
    {
        $sql="DELETE FROM servicios
              WHERE id_servicio=:id";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([

            ":id"=>$id

        ]);
    }

    /**
     * Dashboard
     */
    public function totalServicios()
    {
        return $this->db
            ->query("SELECT COUNT(*) FROM servicios")
            ->fetchColumn();
    }

    public function totalPendientes()
    {
        return $this->db
            ->query("SELECT COUNT(*) FROM servicios WHERE estado='Pendiente'")
            ->fetchColumn();
    }

    public function totalFinalizados()
    {
        return $this->db
            ->query("SELECT COUNT(*) FROM servicios WHERE estado='Finalizado'")
            ->fetchColumn();
    }

    public function obtenerUltimos($limite = 5)
{
    $sql = "SELECT

                s.cliente,
                s.tipo_servicio,
                s.estado,
                s.fecha_programada,

                t.nombre AS tecnico

            FROM servicios s

            LEFT JOIN tecnicos t
            ON s.id_tecnico=t.id_tecnico

            ORDER BY s.id_servicio DESC

            LIMIT :limite";

    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(
        ":limite",
        $limite,
        PDO::PARAM_INT
    );

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}