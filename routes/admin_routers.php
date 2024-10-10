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
        '/admin/add-class' => fn() => loadAdminRoute('AdminController', 'addClass'),
        '/admin/add-user' => fn() => loadAdminRoute('AdminController', 'addUser'),
        '/admin/users' => fn() => loadAdminRoute('AdminController', 'users'),
        '/admin/update-class' => fn() => loadAdminRoute('ClassesController', 'formClassUpdate'),
        '/admin/add-arm' => fn() => loadAdminRoute('AdminController', 'addArm'),
    ],
    'POST' => [
        '/admin/add-arm' => fn() => loadAdminRoute('WeaponController', 'createWeapon'),
        '/admin/add-user' => fn() => loadAdminRoute('AdminController', 'createUser'),
        '/admin/add-class' => fn() => loadAdminRoute('ClassesController', 'create_class'),
        '/admin/update-class' => fn() => loadAdminRoute('ClassesController', 'update'),
        '/admin/delete-class' => fn() => loadAdminRoute('ClassesController', 'delete'),
    ],
    'UPDATE' => [

    ],
    'DELETE' => [

    ]
];


?>
