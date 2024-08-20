<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Services\AuthService;
use Illuminate\Http\Request;

class NewPasswordController extends BaseController
{
    /**
     * Resets user password.
     *
     * @return \Illuminate\Http\Response
     */
    public function newPassword(Request $request, AuthService $authService)
    {
        $attempt = $authService->newPassword($request);

        if ($attempt->success)  {

            return $this->sendResponse(null, 'Senha alterada com sucesso.');
        }

        return $this->sendError('Não foi possível alterar a senha.', $attempt->errors);
    }
}
