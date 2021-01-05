<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('gudang')->insert([
          [
              'nama_barang' => 'beng-beng',
              'harga_barang' => '16000',
              'stok_barang' => '50',
          ]
        ]);
    }
}
