<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 7/10/18
 * Time: 11:51 AM
 */

namespace EnergyDepot\Http;
use EnergyDepot\Lib\NeuEnergyDepotException;
use Illuminate\Http\JsonResponse;

class EnergyDepotHelper
{


    /**
     * @param string $message
     * @param array $payload
     * @param int $responseCode
     * @param bool $hasError
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiResponse(string $message, array $payload, int $responseCode, string $status) : JsonResponse {
        return response()->json([
            'message' => $message,
            'data' => $payload,
            'status' => $status
        ], $responseCode);
    }
}