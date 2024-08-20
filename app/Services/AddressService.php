<?php

namespace App\Services;

use App\Models\City;
use App\Models\State;
use Illuminate\Container\Attributes\DB as AttributesDB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AddressService
{
    /**
     * Finds address through API by Cep.
     *
     * @return mixed
     */
    public function cep($cep)
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->successful()) {

            return $response->json();
        }

        return null;
    }

    /**
     * Get sates
     *
     * @return Collection
     */
    public function getStates()
    {
        return State::get();
    }

    /**
     * Get cities.
     *
     * @return Collection
     */
    public function getCities(Request $request)
    {
        if ($request->has('state_id'))  {

            return City::where(['state_id' => $request->state_id])->get();
        }

        return City::get();
    }
}
