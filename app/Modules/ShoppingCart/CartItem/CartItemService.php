<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\CartItem;

use App\Models\CartItem;
use App\Models\ShoppingSession;
use App\Modules\ShoppingCart\ShoppingSession\ShoppingSessionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class CartItemService
{
    public CartItemRepository $cartItemRepository;
    // Get shopping cart session
    public ShoppingSessionRepository $shoppingSessionRepository;
    public function __construct(CartItemRepository $cartItemRepository, ShoppingSessionRepository $shoppingSessionRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
        $this->shoppingSessionRepository = $shoppingSessionRepository;
    }
    public function getAllData(): Collection
    {
        return $this->cartItemRepository->getAllData();
    }
    public function addProduct(array $data): bool
    {
        $shoppingSession = $this->shoppingSessionRepository->getByUserId(Auth::id());
        $data['session_id'] = $shoppingSession->id;
        $addedProduct = $this->cartItemRepository->insertProduct($data);
        return $addedProduct != null;
    }
}
