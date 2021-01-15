<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->bigInteger('id_kategori')->unsigned();
            $table->string('nama_produk');
            $table->text('deskripsi_produk');
            $table->string('foto_produk');
            $table->float('harga_produk', 19,4);
            $table->string('part_number', 20);
            $table->integer('stok_barang');
            $table->timestamps();
            $table->foreign('id_kategori')->references('id_kategori')->on('kat_produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
