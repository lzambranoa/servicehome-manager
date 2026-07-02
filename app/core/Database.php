<?php

class Database
{
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASS;

    protected $conexion;

    public function conectar()
    {
        if ($this->conexion == null) {

            try {

                $this->conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->user,
                    $this->password
                );

                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {

                die("Error de conexión: " . $e->getMessage());

            }

        }

        return $this->conexion;
    }
}