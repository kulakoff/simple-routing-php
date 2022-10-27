<?php

$routes = [];

function route(string $path, callable $callback)
{
    global $routes;
    $routes[$path] = $callback;
}

function run()
{
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];

    $params = [];
    $found = false;
    foreach ($routes as $path => $callback) {

        if ($uri === $path) {
            $found = true;
            $callback($params);
        } else if (str_contains($uri, $path) && $path !== '/') {

            $offset = count(explode('/', $uri)) - count(explode('/', $path));

            // if $offset > 0, it's mean
            // that there exist some parameters
            // after slash
            if ($offset > 0) {
                $dropedPath = explode('/', $uri);

                // collect params affter each slash
                $params = array_slice($dropedPath, count($dropedPath) - $offset, count($dropedPath));
                // print_r($params);
                $found = true;

                // pass params to callback
                $callback($params);
            }
        }
    }

    if (!$found) {
        $notFoundCallback = $routes['/404'];
        $notFoundCallback($params);
    }
}
