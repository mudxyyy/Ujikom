<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postlog(Request $request)
    {
        $cek = $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($cek)){
            $user = auth::user();
            if($user->role == 'admin'){
                return redirect()->route('prk.index')->with('status','Selamat Datang : '.$user->name);
            }
            return redirect()->route('home')->with('status','Selamat Datang : ' .$user->name);
        }
        return back()->with('status','Username atau Password salah');
    }

    public function reg()
    {
        return view('register');
    }

    public function postreg(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'role'=>'customer'
        ]);
        return redirect()->route('login')->with('status1','Berhasil register');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('status','Berhasil logout');
    }
}
