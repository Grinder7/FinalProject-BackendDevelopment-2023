<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function adminHome()
    {
        if (!Gate::allows('isAdmin')) {
            abort(404, "Sorry, You can do this actions");
        }
        $this->authorize('isAdmin');

        return 'a';
    }
}
