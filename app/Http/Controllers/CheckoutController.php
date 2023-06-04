<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuantityUpdateRequest;
use App\Modules\Payment\PaymentService;
use App\Modules\Product\ProductService;
use App\Modules\ShoppingCart\CartItem\CartItemService;
use App\Modules\ShoppingCart\ShoppingSession\ShoppingSessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
            if (!isset($items)) {
                $items = collect([]);
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
            $totalItems = count($items);
            return view('pages.checkout')->with(compact('payments'))->with(compact('shoppingSession'))->with(compact('items'))->with(compact('totalItems'));
        } else {
            return redirect()->route('login.page');
        }
    }
    public function qtyUpdate(QuantityUpdateRequest $request)
    {
        $validated = $request->validated();
        $shoppingSession = $this->shoppingSessionService->getByUserId(Auth::id());
        $cartItem = $this->cartItemService->getBySessionAndProductId($shoppingSession->id, $validated['product_id']);
        $product = $this->productService->getById($validated['product_id']);
        if ($validated['quantity'] > $product->stock) {
            return Response::json([
                'success' => false,
                'message' => 'Quantity exceeds stock (Max: ' . $product->stock . ')',
                'stock' => $product->stock,
                'quantity' => $cartItem->quantity
            ], 400);
        } else {
            $cartItem->quantity = $validated['quantity'];
            $cartItem->save();
            return Response::json([
                'success' => true,
                'message' => 'Quantity updated',
                'stock' => $product->stock,
                'quantity' => $cartItem->quantity
            ], 200);
        }
    }

    public function deleteItem(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer'
        ]);
        $shoppingSession = $this->shoppingSessionService->getByUserId(Auth::id());
        $product = $this->productService->getById($validated['product_id']);
        $cartItem = $this->cartItemService->getBySessionAndProductId($shoppingSession->id, $validated['product_id']);

        $success = $cartItem->delete();
        if ($success) {
            // Update total price in shopping session
            $shoppingSession->total = $shoppingSession->total - ($cartItem->quantity * $product->price);
            $shoppingSession->save();
            return Response::json([
                'success' => true,
                'message' => 'Item deleted',
                'total' => $shoppingSession->total
            ], 200);
        } else {
            return Response::json([
                'success' => false,
                'message' => 'Item not deleted',
                'total' => $shoppingSession->total
            ], 500);
        }
    }
}
