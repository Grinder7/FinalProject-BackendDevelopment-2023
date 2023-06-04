<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\OrderItem;

use App\Models\OrderItem;

class OrderItemService
{
    public OrderItemRepository $orderItemRepository;
    public function __construct(OrderItemRepository $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }
    public function getAllData()
    {
        return $this->orderItemRepository->getAllData();
    }
    public function create(array $data)
    {
        return $this->orderItemRepository->create($data);
    }
}
