<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Modules\Product\ProductService;
use App\Modules\ShoppingCart\OrderDetail\OrderDetailService;
use App\Modules\ShoppingCart\OrderItem\OrderItemService;
use App\Modules\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public ProductService $productService;
    public OrderDetailService $orderDetail;
    public OrderItemService $orderItem;
    public UserService $user;
    public function __construct(ProductService $productService, OrderDetailService $orderDetail, OrderItemService $orderItem, UserService $user)
    {
        $this->productService = $productService;
        $this->orderDetail = $orderDetail;
        $this->orderItem = $orderItem;
        $this->user = $user;
    }


    public function adminHome()
    {
        if (!Gate::allows('isAdmin')) {
            abort(404, "Sorry, You can do this actions");
        }
        $this->authorize('isAdmin');
        $products = $this->productService->getAllData();
        return view('pages.admin.admin')->with(compact("products"));
    }

    public function adminInvoice()
    {
        if (!Gate::allows('isAdmin')) {
            abort(404, "Sorry, You can do this actions");
        }
        $this->authorize('isAdmin');
        $order_details = $this->orderDetail->getAllData();
        $users = $this->user->getAllData();
        foreach($order_details as $order_detail){
            foreach($users as $user){
                if(!strcmp($user->id, $order_detail->user_id)){
                    $order_detail->username = $user->username;
                }
            }
        }
        return view('pages.admin.invoices')->with(compact("order_details"));        
    }
}
