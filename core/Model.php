<?php

namespace Core;

include __DIR__ . '/Database.php';
use Core\Database;

class Model {
    protected $db;
    protected $conn; 
    protected $table;

    public function __construct() {
        $this->db = new Database(); 
        $this->conn = $this->db->connect(); 
        // if ($this->conn) {
        //     var_dump($this->conn); 
        // }
    }

    public function checkAndCreateTable($name, $creator = "") {
        $query = "
            SELECT EXISTS (
                SELECT FROM information_schema.tables 
                WHERE table_schema = 'public' AND table_name = '$name'
            );
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $exists = $stmt->fetchColumn();

        if (!$exists) {
            $createQuery = $creator;
            $stmt = $this->conn->prepare($createQuery);
            if ($stmt->execute()) {
                return true; //foi criada agorinha
            } else {
                return false; // deu ruim para criar a tabela
            }
        } else {
            return true; //já existe
        }
    }

}
