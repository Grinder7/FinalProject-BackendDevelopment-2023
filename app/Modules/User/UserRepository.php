<?php

declare(strict_types=1);

namespace App\Modules\User;

use App\Models\User;

class UserRepository
{
    public function insertUser(array $data): User
    {
        return User::create($data);
    }
}
