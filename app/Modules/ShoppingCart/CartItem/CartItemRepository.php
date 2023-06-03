<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\CartItem;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;

class CartItemRepository
{
    public function getAllData(): Collection
    {
        return CartItem::all();
    }
    public function insertProduct(array $data): CartItem
    {
        return CartItem::create($data);
    }
}
