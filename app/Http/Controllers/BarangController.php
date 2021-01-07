<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Gudang;
class BarangController extends Controller
{
      public function index(){
        return Gudang::all();
      }

      public function satu($id_barang){
        $barang = Gudang::find($id_barang);
        if($barang == null){
          return response()->json([
             'pesan' => 'Tidak ada barang ber-id ' . $id_barang,
          ]);
        }
        return $barang;
      }

      public function barangbaru(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'foto_barang' => 'required|mimes:jpeg,bmp,png|file|max:512',
        ]);

        if($validator->fails()){
          $errors = $validator->errors();

          return response()->json([
             'error' => $errors->all()
          ]);
        }

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
          $validator = Validator::make($request->all(), [
              'nama_barang' => 'required',
          ]);

          if($validator->fails()){
            $errors = $validator->errors();

            return response()->json([
               'error' => $errors->all()
            ]);
          }

          $barang->nama_barang = $request->nama_barang;
        }

        if($request->has('stok_barang')){
          $validator = Validator::make($request->all(), [
              'stok_barang' => 'required',
          ]);

          if($validator->fails()){
            $errors = $validator->errors();

            return response()->json([
               'error' => $errors->all()
            ]);
          }

          $barang->stok_barang = $request->stok_barang;
        }

        if($request->has('harga_barang')){
          $validator = Validator::make($request->all(), [
              'harga_barang' => 'required',
          ]);

          if($validator->fails()){
            $errors = $validator->errors();

            return response()->json([
               'error' => $errors->all()
            ]);
          }

          $barang->harga_barang = $request->harga_barang;
        }

        if($request->has('foto_barang')){
          $validator = Validator::make($request->all(), [
              'foto_barang' => 'required|mimes:jpeg,bmp,png|file|max:512',
          ]);

          if($validator->fails()){
            $errors = $validator->errors();

            return response()->json([
               'error' => $errors->all()
            ]);
          }

          $nama_barang = time() . '.' . $request->file('foto_barang')->extension();
          Storage::delete($barang->foto_barang);
          $foto_barang = $request->file('foto_barang')->storeAs('public/foto', $nama_barang);
          $barang->foto_barang = $foto_barang;
        }

        $barang->save();

        return response()->json([
           'pesan' => 'update berhasil',
           'data' => $barang
        ]);
      }

      public function hapusbarang($id_barang){
        $barang = Gudang::findOrFail($id_barang);
        Storage::delete($barang->foto_barang);
        $barang->delete();

        return response()->json([
             'pesan' => 'delete berhasil'
        ]);
      }
}
