<?php

namespace App\Core;

use Exception;
use PDO;

class DbConnect
{
    const SERVER = "sqlprive-pc2372-001.privatesql.ha.ovh.net:3306";
    const USER = "cefiidev1149";
    const PASSWORD = "iGgUk529";
    const BASE = "cefiidev1149";

    protected $connection;
    protected $request;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=" . self::SERVER . ";dbname=" . self::BASE,
                self::USER,
                self::PASSWORD
            );
            $this->connection->setAttribute(
                PDO::MYSQL_ATTR_INIT_COMMAND,
                "SET NAMES utf8"
            );
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $this->connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_OBJ
            );
        } catch (Exception $e) {
            die("Erreur: " . $e->getMessage());
        }
    }
}
