<?php

namespace App\Http\Controllers;

use App\Modules\User\UserService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('pages.auth.login');
    }
}
