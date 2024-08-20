<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\BaseController;
use App\Services\AddressService;
use Illuminate\Http\Request;

class StateController extends BaseController
{
    /**
     * Brings states.
     *
     * @return JsonResponse
     */
    public function index(AddressService $addressService)
    {
        $states = $addressService->getStates();

        if ($states)  {

            return $this->sendResponse($states, "Estados recuperadas com sucesso.") ;
        }

        return $this->sendError("Não foi possível recuperar os estados.");
    }
}
