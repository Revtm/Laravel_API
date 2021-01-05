<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gudang;
class BarangController extends Controller
{
      public function index(){
        return Gudang::all();
      }

      public function satu($id_barang){
        return Gudang::find($id_barang);
      }

      public function barangbaru(Request $request){
        return Gudang::create($request->all());
      }

      public function editbarang(Request $request, $id_barang){
        $barang = Gudang::findOrFail($id_barang);
        $barang->update($request->all());

        return $barang;
      }

      public function hapusbarang($id_barang){
        $barang = Gudang::findOrFail($id_barang);
        $barang->delete();
        return 204;
      }
}
