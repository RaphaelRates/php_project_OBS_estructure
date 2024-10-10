<?php 

namespace App\Controllers;

include __DIR__ . '/../../core/Controller.php';
include __DIR__. '/../models/ClasseModel.php';

use Core\Controller;
use App\Models\ClasseModel;

    class ClassesController extends Controller{

        private $classes;

        public function __construct() {
            $this->classes = new ClasseModel();
        }
    
        public function index() {
            $stmt = $this->classes->getClasses();
            return $this->view('classes', ['classes' => $stmt]);
        }
        public function formClassUpdate() {
            $id = $_GET['id'];
            $stmt = $this->classes->getClassById($id);
            return $this->view('updateclass', ["class" => $stmt]);
        }
    
        public function create_class() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->classes->nome = $_POST['nome'] ?? '';
                $this->classes->descricao = $_POST['descricao'] ?? '';
                $this->classes->hitPoints = $_POST['hitpoints'] ?? 0;
                $this->classes->mana = $_POST['mana'] ?? 0;
                $this->classes->habilidades = $_POST['abilities'] ?? '';
    
                if ($this->classes->createClass()) {
                    header("Location: /admin/add-class");
                    exit();
                } else {
                    echo "Erro ao criar a classe.";
                }
            } else {
                return $this->view('createclass');
            }
        }
    
        public function update() {
            $index = $_POST['id'];
            $classe = $this->classes->getClassById($index);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->classes->id = $index;
                $this->classes->nome = $_POST['nome'] ?? '';
                $this->classes->descricao = $_POST['descricao'] ?? '';
                $this->classes->hitPoints = $_POST['hitPoints'] ?? 0;
                $this->classes->mana = $_POST['mana'] ?? 0;
                $this->classes->habilidades = $_POST['abilities'] ?? '';
        
                // Atualiza a classe no banco de dados
                if ($this->classes->updateClass()) {
                    header("Location: /admin/add-class");
                    exit();
                } else {
                    echo "Erro ao atualizar a classe.";
                }
            }
        
            // Exibe o formulário de edição com os dados da classe
            return $this->view('editclass', ['classe' => $classe]);
        }
        public function delete() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id']; // Captura o ID do POST
                $result = $this->classes->deleteClass($id); // Use $this->classes, não $this->classeModel
                if ($result) {
                    header('Location: /admin/add-class');
                    exit;
                } else {
                    // Redirecionar com uma mensagem de erro
                    header('Location: /admin/add-class?error=Erro ao deletar a classe');
                    exit;
                }
            }
            
        }
    }
    
?>