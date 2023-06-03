<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemRequest;
use App\Modules\ShoppingCart\CartItem\CartItemService;
use App\Modules\ShoppingCart\ShoppingSession\ShoppingSessionService;
use Illuminate\Support\Facades\Response;

class ShoppingController extends Controller
{
    public CartItemService $cartItemService;
    public ShoppingSessionService $shoppingSessionService;
    public function __construct(CartItemService $cartItemService, ShoppingSessionService $shoppingSessionService)
    {
        $this->cartItemService = $cartItemService;
        $this->shoppingSessionService = $shoppingSessionService;
    }
    public function storeCart(CartItemRequest $request)
    {
        $validated =  $request->validated();
        $success = $this->cartItemService->addProduct($validated);
        if ($success) {
            $json = Response::json([
                'success' => true,
                'message' => 'Successfully add to cart',
                'data' => $validated
            ], 200);
        } else {
            $json = Response::json([
                'success' => false,
                'message' => 'Failed to add to cart',
                'data' => $validated
            ], 400);
        }
        return $json;
    }
}
