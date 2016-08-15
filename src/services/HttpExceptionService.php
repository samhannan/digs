<?php

namespace services;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HttpExceptionService
{
	private $twig;

	public function __construct($twig)
	{
		$this->twig = $twig;
	}

	public function throwException($code)
	{
	    $templates = array(
	        'errors/'.$code.'.twig',
	    );

	    return new Response($this->twig->resolveTemplate($templates)->render(array('code' => $code)), $code);
	}
}