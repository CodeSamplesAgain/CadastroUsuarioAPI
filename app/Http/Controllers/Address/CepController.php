<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\BaseController;
use App\Services\AddressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CepController extends BaseController
{
    /**
     * Find address by cep.
     *
     * @return JsonResponse
     */
    public function index(Request $request, AddressService $addressService)
    {
        $address = $addressService->cep($request->cep);

        if ($address)   {

            return $this->sendResponse($address, "Endereço recuperado com sucesso.");
        }

        return $this->sendError("Não foi possível recuperar o endereço.");
    }
}
