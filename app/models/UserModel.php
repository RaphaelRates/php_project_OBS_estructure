<?php
namespace App\Models;

include __DIR__."/../../core/Model.php";

use Core\Model;

class UserModel extends Model{

    public $table = 'usuarios'; 
    public $id;
    public $nome;
    public $email;
    public $senha; // Idealmente, deve ser armazenada de forma criptografada
    public $data_criacao;
    public $role; 

    public function getUsers() {
        $creator = "
            CREATE TABLE usuarios (
                id SERIAL PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                senha VARCHAR(255) NOT NULL,  -- Idealmente, deve ser armazenada de forma criptografada
                data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                role VARCHAR(50) DEFAULT 'user'
            );
        ";
        if($this->checkAndCreateTable('usuarios', $creator)){
            try {
                $query = 'SELECT * FROM ' . $this->table;
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                return $stmt; 
            } catch (\Throwable $th) {
                echo $th;
            }
        }
       
    }

    public function createUserDefault() {
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
        $query = 'INSERT INTO ' . $this->table . ' (nome, email, senha, data_criacao, role) VALUES (:nome, :email, :senha, :data_criacao, :role)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':data_criacao', $this->data_criacao);
        $stmt->bindParam(':role', $this->role);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function createUserGoogle(){
        // loading...
    }

    public function updateUserDefault() {
        if (!empty($this->senha)) {
            $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
            $query = 'UPDATE ' . $this->table . ' SET nome = :nome, email = :email, senha = :senha, role = :role WHERE id = :id';
        } else {
            $query = 'UPDATE ' . $this->table . ' SET nome = :nome, email = :email, role = :role WHERE id = :id';
        }

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        if (!empty($this->senha)) {
            $stmt->bindParam(':senha', $this->senha);
        }
        $stmt->bindParam(':role', $this->role);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateUserGoogle() {
        // loading...
    }

    public function deleteUser() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

?>