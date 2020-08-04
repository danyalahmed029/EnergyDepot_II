<?php
/**
 * Created by PhpStorm.
 * User: danyal
 * Date: 6/7/18
 * Time: 2:36 PM
 */

namespace EnergyDepot\Http\Controllers;


use EnergyDepot\Lib\NeuEnergyDepotException;
use EnergyDepot\Service\AdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * Class AdminController
 * @package EnergyDepot\Http\Controllers
 */
class AdminController extends ApiController {

    protected $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->adminService=$adminService;
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllOrders(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("Retrived All the orders",$this->adminService->getAllOrders());
        }
        catch(NeuEnergyDepotException $ex)
        {
            return $this->apiError($ex);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllUsers(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("Retrived all the orders",$this->adminService->getAllUsers());
        }
        catch(NeuEnergyDepotException $ex)
        {
            return $this->apiError($ex);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllTypes(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("Retrived all the user types",$this->adminService->getAllTypes());
        }
        catch(NeuEnergyDepotException $ex)
        {
            return $this->apiError($ex);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function activateUser(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("User activated successfully",$this->adminService->activateUser($request->id));
        }
        catch (NeuEnergyDepotException $ex)
        {
            $this->apiError($ex);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteUser(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("User deleted successfully",$this->adminService->deleteUser($request->uuid));
        }
        catch(NeuEnergyDepotException $ex)
        {
            $this->apiError($ex);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteOrder(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("Order deleted successfully",$this->adminService->deleteOrder($request->uuid));
        }
        catch(NeuEnergyDepotException $ex)
        {
            $this->apiError($ex);
        }
    }
}