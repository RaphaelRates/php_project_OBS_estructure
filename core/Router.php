<?php 

namespace Core;

class Router {
    private $routes = [];

    public function addRoute($method, $route, $callback) {
        $this->routes[$method][$route] = $callback;
    }

    public function dispatch($method, $uri) {
        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
        } else {
            // Lidar com rota não encontrada
        }
    }
    public function GetParams(...$args) {
        $params = [];
        foreach ($args as $a) {
            if (isset($_GET[$a])) {
                $params[$a] = htmlspecialchars($_GET[$a]); 
            }
        }
        return $params; 
    }
}

?>