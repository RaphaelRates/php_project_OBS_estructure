<?php 
namespace App\Controllers;

include __DIR__ . '/../../core/Controller.php';

use Core\Controller;

    class WeaponController extends Controller{
        public function index(){
            return $this->view('weapon');
           
        }
        public function showWeapon($weaponName) {
            return $this->view('singleweapon', ['weaponName' =>$weaponName]);
        }
    }
?>