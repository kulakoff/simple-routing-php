    <?php

    $routes = [];

    function route(string $path, callable $callback)
    {
        global $routes;
        $routes[$path] = $callback;
    }

    function res($message)
    {
        echo $message;
    };

    route(
        '/',
        fn () => res("Main Page")
    );

    route('/signin', fn () => res("Sign in Page"));

    route('/signip', fn () => res("Sign up Page"));

    route('/about', fn () => res("About Page"));

    route('/404', fn () => res("Not Found Page"));
    
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
