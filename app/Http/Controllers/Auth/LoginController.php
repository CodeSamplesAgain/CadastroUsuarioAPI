<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    /**
     * Login in API.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, AuthService $authService)
    {
        $success = $authService->login($request);

        if ($success)  {

            return $this->sendResponse($success, 'Autenticação realizada com sucesso.');
        }

        return $this->sendError('Não autorizado.');
    }
}
