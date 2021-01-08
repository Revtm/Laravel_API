<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Pegawai;

class Login extends Controller
{
    public function index(){
      return view('login');
    }

    public function cekLogin(Request $request){
      $cek = $request->only('id_pegawai', 'password');
        if(Auth::attempt($cek)){
          return redirect()->route('beranda');
        }
    }
}
