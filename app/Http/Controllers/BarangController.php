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

        $namafoto = time().'.'.$request->file('foto_barang')->extension();
        $pindahfoto = $request->file('foto_barang')->move('foto',$namafoto);
        return Gudang::create([
          'nama_barang' => $request->nama_barang,
          'harga_barang' => $request->harga_barang,
          'stok_barang' => $request->stok_barang,
          'foto_barang' => $namafoto
        ]);
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
