<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/routers.php';
require_once __DIR__ . '/../routes/admin_routers.php';
require_once __DIR__ . '/../core/config.php';


function matchRoute($uri, $routes, $request) {
    if (isset($routes[$request])) {
        foreach ($routes[$request] as $route => $action) {
            $pattern = preg_replace('#\{[^\}]+\}#', '([a-zA-Z0-9_-]+)', $route);
            $pattern = "#^" . $pattern . "$#";
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); 
                return [$action, $matches]; 
            }
        }
    }
    return [null, []]; 
}

try {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $request = $_SERVER["REQUEST_METHOD"];
    [$controller, $params] = matchRoute($uri, $routes, $request);

    if ($controller) {
        $controller(...$params); 
    } elseif (isset($adminRoutes[$request]) && array_key_exists($uri, $adminRoutes[$request])) {
        // $_SESSION['user'] = [
        //     'email' => 'teste@gmail.com',
        //     'role' => 'admin'
        // ];
        // if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        //     throw new Exception("Rota não encontrada para {$request} em {$uri}");
        // }
        if(empty($_SESSION)){
            throw new Exception("Rota não encontrada para {$request} em {$uri}, e não está sendo encontrada a sessao");
        }
        if (!isset($_SESSION['user_email']) || htmlspecialchars($_SESSION['user_email']) !== 'rafaelrats3@gmail.com') {
            throw new Exception("Rota não encontrada para {$request} em {$uri}");
        }
        $controller = $adminRoutes[$request][$uri];
        $controller();
    } else {
        throw new Exception("Rota não encontrada para {$request} em {$uri}");
    }

} catch (\Throwable $th) {

    echo "Erro: " . $th->getMessage() . "<br>";
    echo "Arquivo: " . $th->getFile() . "<br>";
    echo "Linha: " . $th->getLine() . "<br>";
    // require __DIR__ . '/../app/views/404.php';
}
?>
<script>
    // function saveLastRoute() {
    //     var lastRoute = window.location.pathname; 
    //     document.cookie = 'last_route=' + encodeURIComponent(lastRoute) + '; path=/; max-age=' + 3600 + '; secure; samesite=strict';
    // }
    // function getCookie(name) {
    //     var cookieArr = document.cookie.split(";");
    //     for (var i = 0; i < cookieArr.length; i++) {
    //         var cookiePair = cookieArr[i].split("=");
    //         if (name == cookiePair[0].trim()) {
    //             return decodeURIComponent(cookiePair[1]);
    //         }
    //     }
    //     return null;
    // }
    // window.addEventListener('load', function() {
    //     var lastRoute = getCookie('last_route');
    //     if (lastRoute && lastRoute !== window.location.pathname) {
    //         window.location.pathname = lastRoute; 
    //     }
    // });
    // window.addEventListener('unload', saveLastRoute);
</script>