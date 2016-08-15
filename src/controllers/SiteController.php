<?php

namespace controllers;

use controllers\Controller;

class SiteController extends Controller
{
	protected $Town;

	public function __construct($twig)
	{
		parent::__construct($twig);
	}

	public function indexAction($Town)
	{
		$Towns = $Town->all();

		return $this->renderer->render('index.twig', array(
			'Towns' => $Towns
		));
	}
}