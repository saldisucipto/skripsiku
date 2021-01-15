<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodePengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metode_pengiriman', function (Blueprint $table) {
            $table->bigIncrements('id_metode_pengiriman');
            $table->string('nama_pengiriman');
            $table->string('jarak_pengiriman');
            $table->double('harga_pengiriman', 19, 4);
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
        Schema::dropIfExists('metode_pengirimen');
    }
}
