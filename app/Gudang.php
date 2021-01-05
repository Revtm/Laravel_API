<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $table = 'gudang';
    protected $primaryKey = 'id_barang';
    protected $fillable =['nama_barang', 'harga_barang', 'stok_barang', 'foto_barang'];
}
