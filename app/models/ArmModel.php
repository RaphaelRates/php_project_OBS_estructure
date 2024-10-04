<?php

namespace App\Models;

use Core\Model;

use PDO;

class ArmModel extends Model{
    private $db;
    protected $table = 'weapons'; 
    public $id;
    public $nome;
    public $descricao;
    public $dano;
    public $passivas;
    public $peso;


    public function getWeapons() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function createAWeapon() {
        $query = 'INSERT INTO ' . $this->table . ' (nome, descricao, dano, passivas, peso) VALUES (:nome, :descricao, :dano, :passivas, :peso)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':dano', $this->dano);
        $stmt->bindParam(':passivas', $this->passivas);
        $stmt->bindParam(':peso', $this->peso);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateWeapon() {
        $query = 'UPDATE ' . $this->table . ' SET nome = :nome, descricao = :descricao, dano = :dano, passivas = :passivas, peso = :peso WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':dano', $this->dano);
        $stmt->bindParam(':passivas', $this->passivas);
        $stmt->bindParam(':peso', $this->peso);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteWeapon() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteAllWeapon() {
        $query = 'DELETE FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
