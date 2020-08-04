<?php
/**
 * User: mlawson
 * Date: 5/24/18
 * Time: 2:42 PM
 */

namespace EnergyDepot\Http\Controllers;


use EnergyDepot\Lib\NeuEnergyDepotException;
use EnergyDepot\Service\CompanyService;
use EnergyDepot\Service\OrderService;
use EnergyDepot\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mikehaertl\pdftk\FdfFile;
use mikehaertl\pdftk\Pdf;
use mikehaertl\pdftk\XfdfFile;
use Illuminate\Support\Facades\File;

/**
 * Class HomeController
 * @package EnergyDepot\Http\Controllers
 */
class HomeController extends ApiController {

    protected $companyService;
    protected $orderService;
    protected $userService;

    public function __construct(CompanyService $companyService,OrderService $orderService,UserService $userService)
    {
        $this->companyService=$companyService;
        $this->orderService=$orderService;
        $this->userService=$userService;
    }

    /**
	 * @return \Illuminate\View\View
	 */
	public function index() {
		return view('home');
	}

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function addCompanyDetails(Request $request):JsonResponse
    {
        try {
            return $this->apiSuccess("Pdf file updated",$this->companyService->addCompanyDetails($request->all()));
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
    public function uploadPdf(Request $request):JsonResponse
    {
	    try {
            return $this->apiSuccess("Contract file uploaded",$this->companyService->uploadPdf($request));
        }
        catch (NeuEnergyDepotException $ex)
        {
            return $this->apiError($ex);
        }
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function placeOrder(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("Order placed successfully",$this->orderService->placeOrder($request->all()));
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
    public function getOrder(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("List of orders",$this->orderService->getOrder($request->email));
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
    public function loadCart(Request $request):JsonResponse
    {
        try{
            return $this->apiSuccess("Cart loaded Sucessfully",$this->orderService->loadCart($request->email));
        }
        catch(NeuEnergyDepotException $ex)
        {
            return $this->apiError($ex);
        }
    }


    public function checkRole(Request $request)
    {
        try{
            return $this->apiSuccess("Role retrived successfully",$this->userService->checkRole($request->email));
        }
        catch(NeuEnergyDepotException $ex)
        {
            return $this->apiError($ex);
        }
    }

}