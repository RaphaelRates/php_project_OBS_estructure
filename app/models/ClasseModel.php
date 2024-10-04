<?php
namespace App\Models;

include __DIR__ . '/../../core/Model.php';

use Core\Model;

class ClasseModel extends Model{
    protected $table = 'classes'; 
    public $id;
    public $nome;
    public $descricao;
    public $hitPoints;
    public $mana;
    public $habilidades;

    public function getClasses() {
        if($this->checkAndCreateTable($this->table, $this->queryTable())) {
            $query = 'SELECT * FROM ' . $this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt; 
        }
    }

    public function createClass() {
        $query = 'INSERT INTO ' . $this->table . ' (nome, descricao, hitPoints, mana, habilidades) VALUES (:nome, :descricao, :hitPoints, :mana, :habilidades)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':hitPoints', $this->hitPoints);
        $stmt->bindParam(':mana', $this->mana);
        $stmt->bindParam(':habilidades', $this->habilidades);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateClass() {
        $query = 'UPDATE ' . $this->table . ' SET nome = :nome, descricao = :descricao, hitPoints = :hitPoints, mana = :mana, habilidades = :habilidades WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':hitPoints', $this->hitPoints);
        $stmt->bindParam(':mana', $this->mana);
        $stmt->bindParam(':habilidades', $this->habilidades);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    protected function queryTable(){
        return "
        CREATE TABLE IF NOT EXISTS classes (
            id SERIAL PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            descricao TEXT NOT NULL,
            hitPoints INT NOT NULL,
            mana INT NOT NULL,
            habilidades TEXT NOT NULL
        );
        ";
    }
}
?>