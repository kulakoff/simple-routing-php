    <?php

    $routes = [];

    function route(string $path, callable $callback)
    {
        global $routes;
        $routes[$path] = $callback;
    }

    route(
        '/',
        function () {
            echo "Main Page";
        }
    );

    route(
        '/404',
        function () {
            echo "Not Found Page";
        }
    );

    function run()
    {
        global $routes;
        $uri = $_SERVER['REQUEST_URI'];
        $found = false;
        foreach ($routes as $path => $callback) {
            if ($path !== $uri) continue;

            $found = true;
            $callback();
        }

        if (!$found) {
            $notFoundCallback = $routes['/404'];
            $notFoundCallback();
        }
    };

    run();
