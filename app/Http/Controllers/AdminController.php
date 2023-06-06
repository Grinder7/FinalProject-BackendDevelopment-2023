<?php

namespace App\Http\Controllers;

use App\Modules\Product\ProductService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public ProductService $productService;
    public function __construct(ProductService $productService){
        $this->productService = $productService;
        
    }

    public function adminHome(){
        $products = $this->productService->getAllData();
        return view('pages.admin.admin')->with(compact("products"));
    }

    public function adminInvoice(){
        return view('pages.admin.invoices');
    }   
}
