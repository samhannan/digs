<?php

namespace Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Controllers\Controller;

class ApiController extends Controller
{
	private $app;
	private $httpExceptionService;
	private $Town;

	public function __construct($twig, $httpExceptionService, $Town)
	{
		$this->httpExceptionService = $httpExceptionService;
		$this->Town = $Town;

		parent::__construct($twig);
	}

	/**
	 * @param  Get all towns for search auto-complete
	 * @param  string $search search term
	 * @return json
	 */
	public function getTownsJsonAction(Request $request, $search)
	{
		if(!$this->isAjaxRequest($request)) {
			return $this->httpExceptionService->throwException(404);
		}

		$Towns = $this->Town
			->where('name', 'LIKE', '%'.$search.'%')
			->pluck('name', 'id');

		$TownsArr = [];

		foreach($Towns as $id => $name) {
			$TownsArr[] = [
				'id' => $id,
				'name' => $name
			];
		}

		return new JsonResponse($TownsArr);
	}
}