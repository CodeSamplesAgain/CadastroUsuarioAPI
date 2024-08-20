<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends BaseController
{
    /**
     * Returns paginated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserService $userService)
    {
        $users = $userService->getUsers($request);

        if ($users)  {

            return $this->sendResponse($users, "Usuários recuperados com sucesso.") ;
        }

        return $this->sendError("Não foi possível recuperar os usuários.");
    }
}
