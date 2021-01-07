<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeederV2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('pegawai')->delete();
      DB::table('gudang')->delete();

      $password = Hash::make('gudangcokelat');

      DB::table('pegawai')->insert([
        [
            'nama_pegawai' => 'Revan',
            'password' => $password,
            'api_token' => Str::random(80),
        ]
      ]);

      DB::table('gudang')->insert([
        [
            'nama_barang' => 'beng-beng',
            'harga_barang' => '16000',
            'stok_barang' => '50',
            'foto_barang' => 'public/foto/1609926183.jpg'
        ]
      ]);
    }
}
