    <?php

    require_once "routes.php";
    require_once "response.php";


    route(
        '/',
        static fn () => response(200, "Main Page")
    );

    route('/signin', static fn ($params) => response(200, "Sign in Page"));

    route('/signip', static fn ($params) => response(200, "Sign up Page"));

    route('/about', static fn ($params) => response(200, "About Page"));

    route('/404', static fn ($params) => response(404, "Not Found Page"));

    run();
