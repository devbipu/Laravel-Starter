<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Controller
{
    public function __construct()
    {
        // Add data to be passed to all views
        $user = Auth::user();
        view()->share('user', $user);
    }


    public function authorize(...$permissions)
    {
        if (Gate::denies($permissions)) {
            abort(403, 'Unauthorized, You don\'t have enough access for this operation');
        }
    }
}
