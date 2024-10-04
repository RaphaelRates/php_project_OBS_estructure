<?php

function load(string $controller, string $action, array $params = []) {
    try {
        $controllerNamespace = "app\\controllers\\{$controller}";
        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }
        $controllerInstance = new $controllerNamespace();
        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("O método {$action} não existe em {$controller}"); 
        }
        $controllerInstance->$action(...$params);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$routes = [
    'GET' => [
        '/' => fn() => load('HomeController', 'index'),
        '/classes' => fn() => load('ClassesController', 'index'),
        '/classes/{className}' => function($className) {
            return load('ClassesController', 'showClass', [$className]);
        },
        '/weapon' => fn() => load('WeaponController', 'index'),
        '/weapon/{weaponName}' => function($weaponName) {
            return load('WeaponController', 'showWeapon', [$weaponName]);
        },
        '/login/google' => fn() => load('LoginController', 'googleLogin'),
        '/login/callback' => fn() => load('LoginController', 'googleCallback'),
        '/logout' => fn() => load('LoginController', 'logout'),
    ],
    'POST' => [
        'create_arms' => fn() => load('CreateArmsController', 'index')
    ],
];




?>