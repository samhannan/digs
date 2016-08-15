<?php

/**
 * Front-end routes
 */
$app->get('/', 'controllers.site:indexAction');

/**
 * API routes
 */
$app->get('/api/get-towns-json/{search}', 'controllers.api:getTownsJsonAction')
	->value('search', '');

