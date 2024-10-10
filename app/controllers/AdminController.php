<?php
namespace App\Controllers;

include __DIR__ . '/../../core/Controller.php';

use Core\Controller;

class AdminController extends Controller {

    public function dashboard() {
        return $this->view('dashboard');
    }

    public function updateSettings() {
        return $this->view('/dashboard');
    }

    public function addClass() {
        return $this->view('formclass');
    }

    public function addUser() {
        return $this->view('formuser');
    }

    public function addArm() {
        return $this->view('formarm');
    }

    public function Users() {
        return $this->view('usersmesa');
    }
}
?>
