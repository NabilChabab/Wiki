<?php

require_once '../../vendor/autoload.php';

use App\routes\Router;

$router = new Router();

$router->setRoutes([
    'GET' => [
        'signup' => ['UserController', 'signup'],
        'signin' => ['UserController', 'login'],
        'home' => ['UserController', 'allCategories'],
        'logout' => ['UserController', 'logout'],
        'admin' => ['AdminController', 'allusers'],
        'category' => ['AdminController', 'allCategories'],
        'addwiki' => ['HomeController', 'allCategories'],
      
    ],
    'POST' => [
        'signup' => ['UserController', 'registerUser'],
        'signin' => ['UserController', 'authenticateUser'],
        'addcatg' => ['CategoryController', 'addcategory'],
        'addtag' => ['TagController', 'addTag'],
        'addwiki' => ['HomeController', 'addwk'],

        
    ],
]);

if (isset($_GET['url'])) {
    $uri = trim($_GET['url'], '/');

    $methode = $_SERVER['REQUEST_METHOD'];

    try {
        $route = $router->getRoute($methode, $uri);

        if ($route) {
            list($controllerName, $methodName) = $route;

            $controllerClass = 'App\\controllers\\' . ucfirst($controllerName);

            $controller = new $controllerClass();

            if ($methodName) {
                if (method_exists($controller, $methodName)) {
                    $controller->$methodName();
                } else {
                    throw new Exception('Method not found in controller.');
                }
            } else {
                $controller->index();
            }
        } else {
            throw new Exception('Route not found.');
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}