<?php

namespace App\Http\Controllers;

use App\Modules\Product\ProductService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
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
        return view('pages.admin.invoices');
    }
}
