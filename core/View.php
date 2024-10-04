<?php

namespace Core;

class View {
    // Método para renderizar a view
    public static function render($view, $data = []) {
        $viewPath = "../app/views/$view.php"; // Caminho para a view

        if (file_exists($viewPath)) {
            extract($data); // Extrai as variáveis do array para a view
            require_once $viewPath; // Carrega a view
        } else {
            die("View não encontrada: $view");
        }
    }
}

?>