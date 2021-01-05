<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('gudang');
      Schema::dropIfExists('pegawai');

      Schema::create('pegawai', function (Blueprint $table) {
          $table->increments('id_pegawai');
          $table->string('nama_pegawai',25);
          $table->string('password');
          $table->timestamps();
      });

      Schema::create('gudang', function (Blueprint $table) {
          $table->increments('id_barang');
          $table->string('nama_barang',25);
          $table->integer('harga_barang');
          $table->integer('stok_barang');
          $table->string('foto_barang')->nullable();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
