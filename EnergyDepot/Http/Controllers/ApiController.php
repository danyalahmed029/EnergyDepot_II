<?php
/**
 * User: mlawson
 * Date: 5/24/18
 * Time: 2:43 PM
 */

namespace EnergyDepot\Http\Controllers;


use EnergyDepot\Lib\NeuEnergyDepotException;
use Illuminate\Http\JsonResponse;

/**
 * Class ApiController
 * @package EnergyDepot\Http\Controllers
 */
class ApiController extends Controller {

	/**
	 * @param string $message
	 * @param array $payload
	 * @param int $responseCode
	 * @return JsonResponse
	 */
	final protected function apiSuccess(string $message, array $payload = [], int $responseCode = 200) : JsonResponse {
		return $this->apiResponse($message, $payload, $responseCode, false);
	}

	/**
	 * @param NeuEnergyDepotException $e
	 * @return JsonResponse
	 */
	final protected function apiError(NeuEnergyDepotException $e) : JsonResponse {
		return $this->apiResponse($e->getMessage(), [
			'error_code' => $e->getErrorCode()
		], $e->getHttpCode(), true);
	}

	/**
	 * @param string $message
	 * @param array $payload
	 * @param int $responseCode
	 * @param bool $hasError
	 * @return \Illuminate\Http\JsonResponse
	 */
	private function apiResponse(string $message, array $payload, int $responseCode, bool $hasError) : JsonResponse {
	    return response()->json([
			'message' => $message,
			'data' => $payload,
			'has_error' => $hasError
		], $responseCode);
	}
}