<?php

namespace controllers;

class Controller
{
	protected $twig;

	public function __construct($twig)
	{
		$this->renderer = $twig;
	}	

	/**
	 * Determines whether current request is ajax
	 * @param  object $request
	 * @return boolean
	 */
	protected function isAjaxRequest($request)
	{
		return $request->isXmlHttpRequest();
	}
}