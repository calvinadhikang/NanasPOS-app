<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function loginView()
    {
        return view('login');
    }

    public function loginAction(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', '=', $username)
            ->where('password', '=', $password)
            ->get();
        if ($user->isEmpty()) {
            toast('Gagal Login','error');
        }else{
            $nama = $user[0]->nama;
            $request->session()->put('user', $user[0]);
            toast("Selamat Datang, $nama",'success');
            return redirect('/dashboard');
        }
        return redirect()->back();
    }

    public function dashboardView()
    {
        $user = Session::get('user');
        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function logoutAction(){
        Session::flush();
        return redirect('/');
    }
}
