<?php

namespace controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use controllers\Controller;

class ApiController extends Controller
{
	private $app;
	private $Town;
	private $httpExceptionService;

	public function __construct($app, $twig, $httpExceptionService)
	{
		$this->app = $app;
		$this->httpExceptionService = $httpExceptionService;

		parent::__construct($twig);
	}

	public function getTownsJsonAction($request, $search, $Town)
	{
		if(!$this->isAjaxRequest($request)) {
			return $this->httpExceptionService->throwException(404);
		}

		$Towns = $Town
			->where('name', 'LIKE', '%'.$search.'%')
			->pluck('name', 'id');

		$TownsArr = [];

		foreach($Towns as $id => $name) {
			$TownsArr[] = [
				'id' => $id,
				'name' => $name
			];
		}

		return $this->app->json($TownsArr);
	}
}