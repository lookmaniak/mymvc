<?php

namespace app;

class Request
{
    public static function handler($controllerClass, $routes)
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = str_replace('/mymvc/index.php', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        if (isset($routes["$method:$url"])) {
            list($methodName) = explode(':', $routes["$method:$url"]);

            // Check if the method exists in the controller class
            if (method_exists($controllerClass, $methodName)) {
                // Instantiate the controller and call the method
                $controller = new $controllerClass();
                $controller->$methodName();
            } else {
                // Handle method not found error
                echo "Error: Method not found.";
            }
        } else {
            // Handle route not found error
            echo 'Route ' . $method.':'.$url. ' not found!';
        }
    }
}