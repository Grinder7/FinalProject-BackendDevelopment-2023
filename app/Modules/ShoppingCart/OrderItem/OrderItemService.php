<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\OrderItem;

use App\Models\OrderItem;

class OrderItemService
{
    public OrderItemRepository $orderItemRepository;
    public function __construct(OrderItem $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }
    public function getAllData()
    {
        return $this->orderItemRepository->getAllData();
    }
}
