<?php

namespace App\Http\Controllers;

use App\Modules\Payment\PaymentService;
use App\Modules\Product\ProductService;
use App\Modules\ShoppingCart\CartItem\CartItemService;
use App\Modules\ShoppingCart\ShoppingSession\ShoppingSessionService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public PaymentService $paymentService;
    public ShoppingSessionService $shoppingSessionService;
    public CartItemService $cartItemService;
    public ProductService $productService;
    public function __construct(PaymentService $paymentService, ShoppingSessionService $shoppingSessionService, CartItemService $cartItemService, ProductService $productService)
    {
        $this->paymentService = $paymentService;
        $this->shoppingSessionService = $shoppingSessionService;
        $this->cartItemService = $cartItemService;
        $this->productService = $productService;
    }
    public function index()
    {
        if (Auth::check()) {
            $payments = $this->paymentService->getPaymentById(Auth::id());
            // Get Shoppping Session
            $shoppingSession = $this->shoppingSessionService->getByUserId(Auth::id());
            // Get Cart Item
            $cartItems = $this->cartItemService->getBySessionId($shoppingSession->id);
            $products = $this->productService->getAllData();
            if (!$cartItems) {
                $items = collect([]);
            } else {
                $i = 0;
                foreach ($cartItems as $cartItem) {
                    $product = $products->only($cartItem->product_id)->first();
                    $productName = $product->name;
                    $productPrice = $product->price;
                    $items[] = array('product_id' => $cartItem->product_id, 'product_name' => $productName, 'quantity' => $cartItem->quantity, 'price' => $productPrice, 'total' => $productPrice * $cartItem->quantity);
                }
            }
            if (count($payments) === 0) {
                $payments = collect([0 => (object)[
                    'firstname' => '',
                    'lastname' => '',
                    'email' => '',
                    'address' => '',
                    'address2' => '',
                    'state' => '',
                    'city' => '',
                    'zip' => '',
                    'remember_detail' => false
                ]]);
            }
            return view('pages.checkout')->with(compact('payments'))->with(compact('shoppingSession'))->with(compact('items'));
        } else {
            return redirect()->route('login.page');
        }
    }

    public function storeDetail()
    {
    }
    public function checkout()
    {
    }
}
