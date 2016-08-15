<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use services\HttpExceptionService;

$app['controllers.site'] = function($app) {
    return new controllers\SiteController($app['twig']);
};

$app['controllers.api'] = function($app) {
    return new controllers\ApiController($app, $app['twig'], $app['services.httpExceptionService']);
};

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    return $app['services.httpExceptionService']->throwException($code);
});

