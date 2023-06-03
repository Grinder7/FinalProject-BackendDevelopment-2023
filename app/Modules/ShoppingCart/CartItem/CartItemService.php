<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\CartItem;

use App\Models\CartItem;

class CartItemService
{
    public CartItemRepository $cartItemRepository;
    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }
    public function getAllData()
    {
        return $this->cartItemRepository->getAllData();
    }
    public function addProduct(array $data)
    {
        $addedProduct = $this->cartItemRepository->insertProduct($data);
        return $addedProduct != null;
    }
}
