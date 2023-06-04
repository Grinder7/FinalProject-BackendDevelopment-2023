<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemRequest;
use App\Modules\ShoppingCart\CartItem\CartItemService;
use App\Modules\ShoppingCart\ShoppingSession\ShoppingSessionService;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            $validated =  $request->validated();
            $response = $this->cartItemService->addProduct($validated);
            return $response;
        } else {
            return Response::json([
                'success' => false,
                'message' => 'Please login first'
            ], 400);
        }
    }
}
