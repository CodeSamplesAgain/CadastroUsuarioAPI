<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\BaseController;
use App\Services\AddressService;
use Illuminate\Http\Request;

class CityController extends BaseController
{
    /**
     * Brings cities, filtered by state or not.
     *
     * @return JsonResponse
     */
    public function index(Request $request, AddressService $addressService)
    {
        $cities = $addressService->getCities($request);

        if ($cities)  {

            return $this->sendResponse($cities, "Cidades recuperadas com sucesso.") ;
        }

        return $this->sendError("Não foi possível recuperar as cidades.");
    }
}
