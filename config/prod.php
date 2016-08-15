<?php

if(DEBUG === true) {
	$app['debug'] = true;
}

$app['twig.path'] = array(__DIR__.'/../src/views');

$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app['assets.named_packages'] =  array(
    'css' => array('base_path' => 'assets/css'),
    'js' => array('base_path' => 'assets/js'),
    'bootstrap' => array('base_path' => 'assets/bootstrap'),
);