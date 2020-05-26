<?php
require "../app/bootstrap.php";
//var_dump($_SERVER);

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//    $r->addRoute('GET', '/', 'homeController.php');

    //Visa alla info
    $r->addRoute('GET', '/info', 'Controller@index');
//    $r->addRoute('GET', '/info/{id:\d+}[/]', 'Controller@show');
//    $r->addRoute('GET', '/info/{id:\d+}/edit[/]', 'Controller@edit');
//    $r->addRoute('GET', '/info/{id:\d+}/delete[/]','Controller@delete');
//    $r->addRoute('POST','/info/{id:\d+}[/]', 'Controller@update');
//    $r->addRoute('GET', '/info/new[/]', 'Controller@add');
//    $r->addRoute('POST','/info/new[/]', 'Controller@store');

//    // {id} must be a number (\d+)
//    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
//    // The /{title} suffix is optional
//    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo "404 hittades inte";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "Rutt hittad men fel protokoll";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
//        echo "Hittade!";
//    var_dump($handler);
    $tmp = explode("@",$handler);
//    var_dump($tmp);
    $class = $tmp[0];
    $method = $tmp[1];
//        require CONTROLLERS . DIRECTORY_SEPARATOR . $class . ".php";
    $controller = new $class;
    $controller->$method($vars);



    //        require "../app/" . $handler;
        break;
}