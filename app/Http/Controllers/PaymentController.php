<?php

namespace App\Http\Controllers;

use App\Modules\Payment\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public PaymentService $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    public function index()
    {
        $payments = $this->paymentService->getPaymentById(Auth::id());
        if ($payments == null) {
            $payments = [
                'firstname' => '',
                'lastname' => '',
                'email' => '',
                'address' => '',
                'address2' => '',
                'state' => '',
                'city' => '',
                'zip' => '',
                'remember_detail' => false
            ];
        }
        return view('pages.checkout')->with(compact('payments'));
    }
}
