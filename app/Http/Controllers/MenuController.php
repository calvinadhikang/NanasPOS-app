<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    //
    public function menuView()
    {
        $user = Session::get('user');
        $menu = Menu::where('divisi', '=', $user->divisi)->paginate(5);
        return view('master.menu.view', [
            'data' => $menu
        ]);
    }

    public function menuAddView()
    {
        return view('master.menu.add');
    }

    public function menuAddAction(Request $request)
    {
        $user = Session::get('user');

        $menu = new Menu();
        $menu->divisi = $user->divisi;
        $menu->nama = $request->input('nama');
        $menu->kategori = $request->input('kategori');
        $menu->harga = $request->input('harga');
        $menu->save();

        toast("Berhasil Tambah Menu", 'success');
        return redirect('menu');
    }

    public function menuDetailView($id)
    {
        $menu = Menu::find($id);
        return view('master.menu.detail', [
            'menu' => $menu
        ]);
    }

    public function menuDetailAction(Request $request)
    {
        $menu = Menu::find($request->input('id'));

        $menu->nama = $request->input('nama');
        $menu->kategori = $request->input('kategori');
        $menu->harga = $request->input('harga');
        $menu->save();

        toast("Berhasil Edit Menu", 'success');
        return redirect('menu');
    }

    public function getMenu($divisi){
        $menu = Menu::where('divisi', '=', $divisi)->get();
        foreach ($menu as $key => $value) {
            $value->qty = 0;
            $value->subtotal = 0;
        }

        return response()->json([
            'error' => false,
            'message' => "Berhasil fetch menu",
            'data' => $menu
        ], 200);
    }
}
