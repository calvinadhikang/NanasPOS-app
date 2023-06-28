<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function menuView()
    {
        $menu = Menu::all();
        return view('master.menu.view', [
            'data' => $menu
        ]);
    }
}
