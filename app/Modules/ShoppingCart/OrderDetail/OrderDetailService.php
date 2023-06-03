<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\OrderDetail;

use App\Models\OrderDetail;

class OrderDetailService
{
    public OrderDetailRepository $orderDetailRepository;
    public function __construct(OrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }
    public function getAllData()
    {
        return $this->orderDetailRepository->getAllData();
    }
}
