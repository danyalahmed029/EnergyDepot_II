<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 6/7/18
 * Time: 2:40 PM
 */

namespace EnergyDepot\Http\Controllers;

use EnergyDepot\Http\Requests\LoginRequest;
use EnergyDepot\Lib\EntityException;
use EnergyDepot\Lib\ExceptionConstants;
use EnergyDepot\Lib\NeuEnergyDepotException;
use EnergyDepot\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mockery\Exception;

/**
 * Class LoginController
 * @package EnergyDepot\Http\Controllers
 */
class LoginController extends ApiController {

    /**
     * @var UserService
     */
    protected $service;

    /**
     * LoginController constructor.
     * @param UserService $newService
     */
    public function __construct(UserService $newService)
    {
        $this->service=$newService;
    }


    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function requestPin(LoginRequest $request): JsonResponse
    {
        try {

            return $this->apiSuccess("User created/modified successfully",$this->service->verifyUser($request->all()));
        }
        catch (NeuEnergyDepotException $e)
        {
            return $this->apiError($e);
        }
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function verifyPin(Request $request): JsonResponse
    {

        try {
            return $this->apiSuccess("Pin verified successfully",$this->service->verifyPin($request->all()));
        }
        catch (NeuEnergyDepotException $ex)
        {
            return $this->apiError($ex);
        }
    }

}