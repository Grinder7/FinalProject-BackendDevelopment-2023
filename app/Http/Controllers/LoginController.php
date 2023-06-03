<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ShoppingSessionRequest;
use App\Modules\ShoppingCart\ShoppingSession\ShoppingSessionService;
use App\Modules\User\UserService;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public UserService $userService;
    public ShoppingSessionService $shoppingSessionService;
    public function __construct(UserService $userService, ShoppingSessionService $shoppingSessionService)
    {
        $this->userService = $userService;
        $this->shoppingSessionService = $shoppingSessionService;
    }
    public function index()
    {
        return view('pages.auth.login');
    }
    public function createCart(ShoppingSessionRequest $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'integer'
        ]);
        $this->shoppingSessionService->create($validated);
        $json = Response::json([
            'success' => true,
            'message' => 'Successfully create cart',
            'data' => $validated
        ], 200);
        return $json;
    }
    public function store(LoginRequest $request)
    {
        $request->checkThrottle();
        $success = $this->userService->login($request->validated(), $request->throttleKey());
        if ($success) {
            // Add Shopping Session to Database
            $requestCart = ShoppingSessionRequest::create(route('login.createCart'), 'POST', [
                'user_id' => Auth::user()->id,
                'total' => 0
            ]);
            $response = $this->createCart($requestCart);
            $successCart = $response->getData(true);
            if ($successCart['success'] == true) {
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->back()->withErrors(['email' => 'Unexpected Error'])->onlyInput();
            }
        } else {
            return redirect()->back()->withErrors(['email' => trans('auth.failed')])->onlyInput();
        }
    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(RouteServiceProvider::HOME);
    }
}
