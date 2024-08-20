<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Spatie\QueryBuilder\QueryBuilder;

class UserService
{
    /**
     * Returns paginated users.
     *
     * @return Collection
     */
    public function getUsers()
    {
        try {

            return QueryBuilder::for(User::class)
                ->allowedIncludes(['addresses', 'addresses.city', 'addresses.state'])
                ->paginate();
        } catch (Exception $e) {

            error_log($e->getMessage());
            return false;
        }
    }
}
