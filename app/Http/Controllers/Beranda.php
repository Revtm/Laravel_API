<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Beranda extends Controller
{

    public function index(Request $request){
      return view('beranda');
    }

    public function getBarang(){

    }

    public function cekLogout(){
      Auth::logout();
      return redirect()->route('halamanlogin');
    }
}
