<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

require '../includes/DbConnect.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    
    $response->getBody()->write("Hello, $name");

    $db = new DbConnect; 

    if($db->connect() != null){
        echo 'Connection Successfull';
    }

    return $response;
});

$app->run();