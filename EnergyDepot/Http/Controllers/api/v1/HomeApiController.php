<?php
/**
 * User: mlawson
 * Date: 5/24/18
 * Time: 2:54 PM
 */

namespace EnergyDepot\Http\Controllers\api\v1;


use EnergyDepot\Http\Controllers\ApiController;

/**
 * Class HomeApiController
 * @package EnergyDepot\Http\Controllers\api\v1
 */
class HomeApiController extends ApiController {


	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index() {
		return $this->apiSuccess('It worked!');
	}

}