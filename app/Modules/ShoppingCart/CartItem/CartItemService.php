<?php

declare(strict_types=1);

namespace App\Modules\ShoppingCart\CartItem;

use App\Models\CartItem;
use App\Models\ShoppingSession;
use App\Modules\Product\ProductRepository;
use App\Modules\ShoppingCart\ShoppingSession\ShoppingSessionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class CartItemService
{
    public CartItemRepository $cartItemRepository;
    // Get shopping cart session
    public ShoppingSessionRepository $shoppingSessionRepository;
    // Get product 
    public ProductRepository $productRepository;
    public function __construct(CartItemRepository $cartItemRepository, ShoppingSessionRepository $shoppingSessionRepository, ProductRepository $productRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
        $this->shoppingSessionRepository = $shoppingSessionRepository;
        $this->productRepository = $productRepository;
    }
    public function getAllData(): Collection
    {
        return $this->cartItemRepository->getAllData();
    }
    public function getBySessionAndProductId(string $sId, int $pId): CartItem | null
    {
        return $this->cartItemRepository->getBySessionAndProductId($sId, $pId);
    }
    public function addProduct(array $data): bool
    {
        $shoppingSession = $this->shoppingSessionRepository->getByUserId(Auth::id());
        $data['session_id'] = $shoppingSession->id;
        $cartItem = $this->cartItemRepository->getBySessionAndProductId($shoppingSession->id, (int)$data['product_id']);
        // Check if stock is available
        $product = $this->productRepository->getById((int)$data['product_id']);
        if (($cartItem != null) && ($product->stock < $cartItem->quantity + $data['quantity'])) {
            return false;
        }
        $addedProduct = $this->cartItemRepository->insertProduct($data);
        return $addedProduct != null;
    }
}
