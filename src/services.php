<?php

$app['services.httpExceptionService'] = function($app) {
    return new services\HttpExceptionService($app['twig']);
};
