    <?php

    require_once "routes.php";
    require_once "response.php";


    route('/', static fn () => response(200, "OK", "Main Page", []));

    route('/signin', static fn ($params) => response(200, "OK", "Sign in Page", $params));

    route('/signip', static fn ($params) => response(200, "OK", "Sign up Page", $params));

    route('/about', static fn ($params) => response(200, "OK", "About page", $params));

    route('/404', static fn () => response(404, "Not Found", "Not Found Page", []));

    run();
