<?php
use Symfony\Component\HttpFoundation\Request;

$app->get('/', function () use ($app) {
    return $app['controllers.site']->indexAction($app['models.town']);
});

/**
 * API routes
 */
$app->get('/api/get-towns-json/{search}', function (Request $request, $search) use ($app) {
    return $app['controllers.api']->getTownsJsonAction($request, $search, $app['models.town']);
})
->value('search', '');