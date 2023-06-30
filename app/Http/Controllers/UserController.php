<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function userView()
    {
        $user = User::all();
        return view('master.user.view', [
            'data' => $user
        ]);
    }

    public function userAddView()
    {
        return view('master.user.add');
    }

    public function userAddAction(Request $request)
    {
        $user = new User();
        $user->nama = $request->input('nama');
        $user->telp = $request->input('telp');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->divisi = $request->input('divisi');
        $user->role = $request->input('role');
        $user->save();

        toast("Berhasil Tambah User", 'success');
        return redirect('user');
    }

    public function userDetailView($id)
    {
        $user = User::find($id);
        return view('master.user.detail', [
            'user' => $user
        ]);
    }

    public function userDetailAction(Request $request)
    {
        $user = User::find($request->input('id'));

        $user->nama = $request->input('nama');
        $user->telp = $request->input('telp');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->divisi = $request->input('divisi');
        $user->role = $request->input('role');
        $user->save();

        toast("Berhasil Edit User", 'success');
        return redirect('user');
    }
}
