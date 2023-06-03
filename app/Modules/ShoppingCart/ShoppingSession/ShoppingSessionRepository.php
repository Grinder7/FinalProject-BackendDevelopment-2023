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
    public function getByUserId(string $uid): ShoppingSession
    {
        $current_user = ShoppingSession::where('user_id', $uid)->get()->first();
        if (!$current_user) {
            $current_user = $this->create(['user_id' => $uid, 'total' => 0]);
        }
        return $current_user;
    }
}
