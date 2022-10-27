<?php

class Router
{
    private static $routes = [];

    public static function route(string $path, callable $callback)
    {
        self::$routes[$path] = $callback;
    }

    public static function run()
    {
    }
}
