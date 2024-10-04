<?php

function loadAdminRoute(string $controller, string $action,array $params = []){
    try{
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

$adminRoutes = [
    'GET' => [
        '/admin' => fn() => loadAdminRoute('AdminController', 'dashboard'),
        '/admin/settings' => fn() => loadAdminRoute('AdminController', 'settings'),
        '/admin/add-class' => fn() => loadAdminRoute('AdminController', 'addClass'),
        '/admin/add-user' => fn() => loadAdminRoute('AdminController', 'addUser'),
        '/admin/users' => fn() => loadAdminRoute('AdminController', 'Users'),
        '/admin/add-arm' => fn() => loadAdminRoute('AdminController', 'addArm'),
    ],
    'POST' => [
        '/admin/update-settings' => fn() => loadAdminRoute('AdminController', 'updateSettings'),
        '/admin/add-arm' => fn() => loadAdminRoute('WeaponController', 'createWeapon'),
        '/admin/add-user' => fn() => loadAdminRoute('', 'updateSettings'),
        '/admin/add-class' => fn() => load('ClassesController', 'create'),
        '/admin/update-class/{id}' => function($id) {
                return load('ClassesController', 'update', [$id]);
            },
        '/admin/delete-class/{id}' => function($id) {
                return load('ClassesController', 'delete', [$id]);
            },
        '/admin/delete-arm' => fn() => loadAdminRoute('AdminController', 'updateSettings'),
        '/admin/delete-user' => fn() => loadAdminRoute('AdminController', 'updateSettings'),
        '/admin/delete-class' => fn() => loadAdminRoute('AdminController', 'updateSettings'),
        '/admin/update-arm' => fn() => loadAdminRoute('AdminController', 'updateSettings'),
        '/admin/update-user' => fn() => loadAdminRoute('AdminController', 'updateSettings'),
        '/admin/update-class' => fn() => loadAdminRoute('AdminController', 'updateSettings'),
    ],
];


?>
