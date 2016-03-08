<?php
//tartarus-framework/web/front.php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventDispatcher;

$request = Request::CreateFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();

$framework = new Tartarus\Framework($matcher, $resolver);
$response = $framework->handle($request);

$response->send();
