<?php

namespace App\Http\Controllers;

use App\Modules\PaymentDetail\PaymentDetailService;
use App\Modules\Product\ProductService;
use App\Modules\ShoppingCart\OrderDetail\OrderDetailService;
use App\Modules\ShoppingCart\OrderItem\OrderItemService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public OrderDetailService $orderDetailService;
    public OrderItemService $orderItemService;
    public PaymentDetailService $paymentDetailService;
    public ProductService $productService;
    public function __construct(OrderDetailService $orderDetailService, OrderItemService $orderItemService, PaymentDetailService $paymentDetailService, ProductService $productService)
    {
        $this->orderDetailService = $orderDetailService;
        $this->orderItemService = $orderItemService;
        $this->paymentDetailService = $paymentDetailService;
        $this->productService = $productService;
    }
    public function index(Request $request)
    {
        $orderDetail = $this->orderDetailService->getById($request->id);
        $orderItems = $this->orderItemService->getByDetailId($orderDetail->id);
        $paymentDetail = $this->paymentDetailService->getById($orderDetail->payment_id);
        $products = $this->productService->getAllData();
        foreach ($orderItems as $orderItem) {
            $product = $products->only($orderItem->product_id)->first();
            $productName = $product->name;
            $productPrice = $product->price;
            $items[] = array('product_id' => $orderItem->product_id, 'product_name' => $productName, 'quantity' => $orderItem->quantity, 'price' => $productPrice, 'total' => $productPrice * $orderItem->quantity);
        }
        return view('pages.invoice')->with(compact('orderItems'))->with(compact('paymentDetail'))->with(compact('orderDetail'))->with(compact('items'));
    }
}
