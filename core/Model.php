<?php

namespace Core;

include __DIR__ . '/Database.php';
use Core\Database;

class Model {
    protected $db;
    protected $conn; 

    public function __construct() {
        $this->db = new Database(); 
        $this->conn = $this->db->connect(); 
        // if ($this->conn) {
        //     var_dump($this->conn); 
        // }
    }

    public function checkAndCreateTable($name, $creator = "") {
        // Consulta para verificar se a tabela existe
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
                return true; // A tabela foi criada
            } else {
                return false; // Erro ao criar a tabela
            }
        } else {
            return true; // A tabela já existe
        }
    }

}
