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
    public function create(array $data): OrderItem
    {
        return OrderItem::create($data);
    }
    public function updateData(OrderItem $orderItem, array $data): bool
    {
        return $orderItem->update($data);
    }
    public function getById(string $id): OrderItem | null
    {
        return OrderItem::find($id);
    }
}
