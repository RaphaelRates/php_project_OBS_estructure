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
    
        public function create() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Captura os dados do formulário
                $this->classes->nome = $_POST['nome'] ?? '';
                $this->classes->descricao = $_POST['descricao'] ?? '';
                $this->classes->hitPoints = $_POST['hitPoints'] ?? 0;
                $this->classes->mana = $_POST['mana'] ?? 0;
                $this->classes->habilidades = $_POST['abilities'] ?? '';
    
                if ($this->classes->createClass()) {
                    // Redireciona após a criação bem-sucedida
                    header("Location: /admin/classes");
                    exit();
                } else {
                    echo "Erro ao criar a classe.";
                }
            } else {
                // Renderiza o formulário de criação
                return $this->view('createclass');
            }
        }
    
        public function update($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->classes->id = $id;
                $this->classes->nome = $_POST['nome'] ?? '';
                $this->classes->descricao = $_POST['descricao'] ?? '';
                $this->classes->hitPoints = $_POST['hitPoints'] ?? 0;
                $this->classes->mana = $_POST['mana'] ?? 0;
                $this->classes->habilidades = $_POST['abilities'] ?? '';
    
                if ($this->classes->updateClass()) {
                    // Redireciona após a atualização bem-sucedida
                    header("Location: /admin/classes");
                    exit();
                } else {
                    echo "Erro ao atualizar a classe.";
                }
            } else {
                // Obtém os dados da classe atual e renderiza o formulário de edição
                $classe = $this->classes->getClassById($id);
                return $this->view('editclass', ['classe' => $classe]);
            }
        }
    }
?>