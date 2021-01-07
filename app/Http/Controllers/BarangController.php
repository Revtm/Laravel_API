<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $nama_barang = time() . '.' . $request->file('foto_barang')->extension();

        $foto_barang = $request->file('foto_barang')->storeAs('public/foto', $nama_barang);
        return Gudang::create([
          'nama_barang' => $request->nama_barang,
          'harga_barang' => $request->harga_barang,
          'stok_barang' => $request->stok_barang,
          'foto_barang' => $foto_barang,
        ]);
      }

      public function editbarang(Request $request, $id_barang){
        $barang = Gudang::findOrFail($id_barang);

        if($request->has('nama_barang')){
            $barang->nama_barang = $request->nama_barang;
        }

        if($request->has('stok_barang')){
          $barang->stok_barang = $request->stok_barang;
        }

        if($request->has('harga_barang')){
          $barang->harga_barang = $request->harga_barang;
        }

        if($request->has('foto_barang')){
          $nama_barang = time() . '.' . $request->file('foto_barang')->extension();
          Storage::delete($barang->foto_barang);
          $foto_barang = $request->file('foto_barang')->storeAs('public/foto', $nama_barang);
          $barang->foto_barang = $foto_barang;
        }

        $barang->save();

        return $barang;
      }

      public function hapusbarang($id_barang){
        $barang = Gudang::findOrFail($id_barang);
        Storage::delete($barang->foto_barang);
        $barang->delete();

        return 204;
      }
}
