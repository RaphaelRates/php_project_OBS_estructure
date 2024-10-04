<?php 
namespace App\Controllers;

include __DIR__ . '/../../core/Controller.php';

use Core\Controller;
use Core\Database;

    class CreateArmsController extends Controller{
        private $db;

        public function index(){
            return $this->view('create_arms');
        }

    }
?>