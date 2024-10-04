<?php
namespace App\Controllers;

include __DIR__ . '/../../core/Controller.php';

use Core\Controller;
    
    class HomeController extends Controller{
        public function index(){
            return $this->view("home");
        }
    }
?>