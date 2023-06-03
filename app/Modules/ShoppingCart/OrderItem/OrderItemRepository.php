<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\OrderItem;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;

class OrderItemRepository
{
    public function getAllData(): Collection
    {
        return OrderItem::all();
    }
}
