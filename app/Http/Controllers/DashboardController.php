<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function usersList()
    {
        return view('pages.users.index');
    }
}
