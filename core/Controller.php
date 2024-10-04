<?php 
namespace Core;
use League\Plates\Engine;

    abstract class Controller{
        public  static function view(string $view, array $data = []){
            $viewsPath = dirname(__FILE__, 2). "/app/views";


            if(!file_exists($viewsPath . DIRECTORY_SEPARATOR . $view .".php")){
                throw new \Exception("A view {$view } nao existe");
            }

            $template = new Engine($viewsPath);
            echo $template->render($view, $data);
        }
        // public static function updateLastRoute($newRoute) {
        //     setcookie('last_route', $newRoute, time() + 3600, "/", "", true, true);
        // }
    }
?>