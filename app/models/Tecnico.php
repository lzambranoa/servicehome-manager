<?php

class Tecnico extends Model
{
    public function obtenerTodos()
    {
        $sql = "SELECT
                    id_tecnico,
                    nombre,
                    documento,
                    telefono,
                    correo,
                    especialidad,
                    estado
                FROM tecnicos
                ORDER BY id_tecnico DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($datos)
    {
        try {

            $sql = "INSERT INTO tecnicos
                    (
                        nombre,
                        documento,
                        telefono,
                        correo,
                        especialidad
                    )
                    VALUES
                    (
                        :nombre,
                        :documento,
                        :telefono,
                        :correo,
                        :especialidad
                    )";

            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                ":nombre" => $datos["nombre"],
                ":documento" => $datos["documento"],
                ":telefono" => $datos["telefono"],
                ":correo" => $datos["correo"],
                ":especialidad" => $datos["especialidad"]
            ]);

        } catch (PDOException $e) {

            return false;

        }
    }

    public function existeDocumento($documento)
    {
        $sql = "SELECT COUNT(*) FROM tecnicos
            WHERE documento=:documento";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ":documento" => $documento
        ]);

        return $stmt->fetchColumn() > 0;
    }

    public function existeCorreo($correo)
    {
        $sql = "SELECT COUNT(*) FROM tecnicos
            WHERE correo=:correo";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ":correo" => $correo
        ]);

        return $stmt->fetchColumn() > 0;
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT
                id_tecnico,
                nombre,
                documento,
                telefono,
                correo,
                especialidad,
                estado
            FROM tecnicos
            WHERE id_tecnico = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([

            ":id" => $id

        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function actualizar($datos)
    {
        $sql = "UPDATE tecnicos SET

            nombre=:nombre,
            documento=:documento,
            telefono=:telefono,
            correo=:correo,
            especialidad=:especialidad,
            estado=:estado

            WHERE id_tecnico=:id_tecnico";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([

            ":nombre" => $datos["nombre"],
            ":documento" => $datos["documento"],
            ":telefono" => $datos["telefono"],
            ":correo" => $datos["correo"],
            ":especialidad" => $datos["especialidad"],
            ":estado" => $datos["estado"],
            ":id_tecnico" => $datos["id_tecnico"]

        ]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tecnicos
          WHERE id_tecnico=:id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":id" => $id
        ]);
    }

    public function totalTecnicos()
{
    $sql = "SELECT COUNT(*) AS total FROM tecnicos";

    $stmt = $this->db->prepare($sql);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}
}