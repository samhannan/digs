<?php

namespace controllers;

class Controller
{
	protected $twig;

	public function __construct($twig)
	{
		$this->renderer = $twig;
	}	

	protected function isAjaxRequest($request)
	{
		return $request->isXmlHttpRequest();
	}
}