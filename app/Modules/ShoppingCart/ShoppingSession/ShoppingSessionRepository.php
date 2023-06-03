<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\ShoppingSession;

use App\Models\ShoppingSession;
use Illuminate\Database\Eloquent\Collection;

class ShoppingSessionRepository
{
    public function getAllData(): Collection
    {
        return ShoppingSession::all();
    }
    public function create(array $data): ShoppingSession
    {
        return ShoppingSession::create($data);
    }
}
