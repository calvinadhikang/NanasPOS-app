<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function loginView()
    {
        return view('login');
    }

    public function dashboardView()
    {
        return view('template.header');
    }
}
