<?php

use MikrotikProject\Exceptions\DbException;
use MikrotikProject\Exceptions\NotFoundException;
use MikrotikProject\Views\View;
spl_autoload_register(function ($className)
{
    $class = './src/'.str_replace('\\', '/', $className).'.php';
    require_once $class;
});
/* Фронтконтроллер */

try
{
    function myAutoLoader(string $className)
    {
    require_once __DIR__ . '/src/' . $className . '.php';
    }

    spl_autoload_register('myAutoLoader'); // автозагрузка неймспейсов

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/src/MikrotikProject/Components/routes.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction)
    {
        preg_match($pattern, $route, $matches);
        if (!empty($matches))
        {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound)
    {
        throw new NotFoundException();
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (DbException $e){
    $view = new View(__DIR__ . '/templates/errors');
    $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
} catch (NotFoundException $e){
    $view = new View(__DIR__ . '/templates/errors');
    $view->renderHtml('404.php', ['error' => $e->getMessage(), 404]);
}

?>