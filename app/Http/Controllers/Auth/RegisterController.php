<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    /**
     * Register user.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, AuthService $authService)
    {
        $attempt = $authService->register($request);

        if ($attempt->success)  {

            return $this->sendResponse($attempt->success, 'Cadastro realizado com sucesso.');
        }

        return $this->sendError('Não autorizado.', $attempt->errors);
    }
}
