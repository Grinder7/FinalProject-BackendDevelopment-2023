<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ShoppingController extends Controller
{
    public function store(CartItemRequest $request)
    {
        $validated =  $request->validated();
        $json = Response::json([
            'success' => true,
            'message' => 'Successfully add to cart',
            'data' => $validated
        ], 200);
        // dd($json);
        return $json;
        // return Response::download('images/app/product/uZqpGDT91YEbzLHnzd7o.jpg');
        // return response('Hello World', 200)
        // ->json([
        //     'success' => true,
        //     'message' => 'Successfully add to cart'
        // ]);
        // ->download('http://localhost:8000/images/app/product/uZqpGDT91YEbzLHnzd7o.jpg');
    }
}
