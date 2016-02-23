<?php
//tartarus/front.php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::CreateFromGlobals();

$response = new Response();

$map = [
    '/hello' => __DIR__.'/../src/pages/hello.php',
    '/bye'  => __DIR__.'/../src/pages/bye.php',
];

$path = $request->getPathInfo();

if(isset($map[$path])) {
    require $map[$path];
} else {
    $response->setStatusCode(404);
    $response->setContent('page not found');
}

$response->send();
