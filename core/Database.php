<?php

namespace Core;

use PDO;
use PDOException;

class Database {
    public $connection;

    public function __construct() {
        $this->connection = $this->connect();
    }

    public function connect() {
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_NAME');
        $user = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');
        $this->connection = null; 

        try {
            $this->connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            return null;
        }
        return $this->connection; 
    }

    public function getConnection() {
        return $this->connection;
    }
}