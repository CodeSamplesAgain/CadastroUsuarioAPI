<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Services\AuthService;
use Illuminate\Http\Request;

class ForgotPasswordController extends BaseController
{
    /**
     * Sends password reset email.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request, AuthService $authService)
    {
        $success = $authService->forgotPassword($request);

        if ($success)  {

            return $this->sendResponse(null, 'Email enviado com sucesso.');
        }

        return $this->sendError('Não foi possível enviar o email.');
    }
}
