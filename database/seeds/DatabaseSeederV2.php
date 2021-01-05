<?php

use Illuminate\Database\Seeder;

class DatabaseSeederV2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $password = Hash::make('gudangcokelat');
      DB::table('pegawai')->insert([
        [
            'nama_pegawai' => 'Revan',
            'password' => $password,
        ]
      ]);

      DB::table('gudang')->insert([
        [
            'nama_barang' => 'beng-beng',
            'harga_barang' => '16000',
            'stok_barang' => '50',
            'foto_barang' => 'bengbeng.jpg'
        ]
      ]);
    }
}
