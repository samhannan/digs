<?php

namespace controllers;

use controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class SiteController extends Controller
{
	public function __construct($twig)
	{
		parent::__construct($twig);
	}

	/**
	 * Site index
	 * @return [type]
	 */
	public function indexAction()
	{
		return $this->renderer->render('index.twig', array());
	}
}