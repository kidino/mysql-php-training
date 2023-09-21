<?php
// load the router
$router = new \Bramus\Router\Router();

// routing rules

$router->before('GET|POST', '/app/.*', function() {
    if (!isset($_SESSION['loggedin'])) {
        $msg = urlencode("You do not have access to this page, or session has expired.");
        header('Location: /auth/login?error='.$msg);
        exit();
    }

    // set some caching rule to prevent browser from caching protected pages
    header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");    
});

$router->get('/', 'App\Controllers\Home@index');
$router->get('/login', 'App\Controllers\Home@login');

$router->get('/auth/login', 'App\Controllers\Auth@login');
$router->post('/auth/login', 'App\Controllers\Auth@process_login');

$router->get('/auth/register', 'App\Controllers\Auth@register');
$router->post('/auth/register', 'App\Controllers\Auth@process_register');

$router->get('/auth/logout', 'App\Controllers\Auth@logout');

$router->get('/app/films', 'App\Controllers\Films@index');

$router->get('/app/actors', 'App\Controllers\Actors@index');

// $router->get('/', function(){ echo "ROUTER IS WORKING"; });

// $router->get('/page2', function(){ echo "ini page 2 -- eh, bukan!"; });
// $router->get('/page3', function(){ echo "ini page 3 -- tiga"; });
// $router->get('/page4', function(){ echo "ini page 4"; });
// $router->get('/page5', function(){ echo "ini page 5"; });
// $router->get('/saya', function(){ echo "ini saya"; });

// Good
// $router->get('/hello', function() {
//     echo '<h1>Hello Orang Asing</h1>';
// });

// // Good
// $router->get('/hello/(\w+)', function($name) {
//     echo '<h1>Hello ' . htmlentities($name).'</h1>';
// });


// run router
$router->run();