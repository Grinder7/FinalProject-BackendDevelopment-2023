<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ShoppingController extends Controller
{
    public function store()
    {
        return Response::download('images/app/product/uZqpGDT91YEbzLHnzd7o.jpg');
        // return response('Hello World', 200)
        // ->json([
        //     'success' => true,
        //     'message' => 'Successfully add to cart'
        // ]);
        // ->download('http://localhost:8000/images/app/product/uZqpGDT91YEbzLHnzd7o.jpg');
    }
}
