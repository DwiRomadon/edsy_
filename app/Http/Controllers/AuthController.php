<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Redirect; //untuk redirect
use DB;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

   public function login (){

        return view('Login');
    }

    function postlogin (Request $request){

     $akun =   DB::table('tbuser')
           ->where('username', $request->username)->first();
        //    ->where('password', $request->password)->first();

            if ($akun) {
                // cek enkripsi password
                $passwordEnkripsi = $akun->password;
                $password = $request->password;
                // $benar = ;
               

                // manggil data user yang login
                // Auth::user()->nama
                // kalo di file selain controller dan view
                // auth()->user
                if (password_verify($password, $passwordEnkripsi)) {
                    Auth::LoginUsingId($akun->id);

                    // Cek akun aktif/tidak belom ditambahkan.
                   if($akun->role ==='guru') {
                           return redirect()->route('dashboard');
                   } else {
                       Auth::logout();
                     return  'kamu siapa';
                   }
                
                } else {
                    return back()->with(['warning' => 'Password yang Anda Masukan Salah !']);
                }
            } else {
                return back()->with(['warning' => 'Username Tidak Ditemukan !']);
            }

    }

    public function logout () {
        Auth::logout();
        return redirect()->route('login');
    }

}
