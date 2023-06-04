<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentDetailRequest;
use App\Modules\PaymentDetail\PaymentDetailService;
use App\Modules\ShoppingCart\OrderDetail\OrderDetailService;
use App\Modules\ShoppingCart\OrderItem\OrderItemService;
use App\Modules\ShoppingCart\ShoppingSession\ShoppingSessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public PaymentDetailService $paymentDetailService;
    public OrderDetailService $orderDetailService;
    public OrderItemService $orderItemService;
    public ShoppingSessionService $shoppingSessionService;

    public function __construct(PaymentDetailService $paymentDetailService, OrderDetailService $orderDetailService, OrderItemService $orderItemService, ShoppingSessionService $shoppingSessionService)
    {
        $this->paymentDetailService = $paymentDetailService;
        $this->orderDetailService = $orderDetailService;
        $this->orderItemService = $orderItemService;
        $this->shoppingSessionService = $shoppingSessionService;
    }


    public function confirm(PaymentDetailRequest $request)
    {
        if (Auth::check()) {
            $shoppingSession = $this->shoppingSessionService->getByUserId(Auth::id());
            if ($shoppingSession->total == 0) {
                return redirect()->route('checkout.page')->with('error', 'Your cart is empty');
            } else {
                $validated = $request->validated();
                $validated['user_id'] = Auth::id();
                $success1 = $this->paymentDetailService->create($validated);
                // Copy Shopping Session to Order Detail
                $success2 = $this->paymentDetailService->create($shoppingSession->id, $validated['user_id']);
            }
            return 'a';
        } else {
            return redirect()->route('login.page');
        }
    }
}
