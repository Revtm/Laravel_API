<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('gudang');
      Schema::create('gudang', function (Blueprint $table) {
          $table->increments('id_barang');
          $table->string('nama_barang',25);
          $table->integer('harga_barang');
          $table->integer('stok_barang');
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
