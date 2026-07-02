<?php

require_once '../config/config.php';
require_once 'Database.php';

class Model
{
    protected $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->conectar();
    }
}