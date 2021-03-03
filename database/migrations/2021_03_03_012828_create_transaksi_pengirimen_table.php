<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pengiriman', function (Blueprint $table) {
            $table->bigIncrements('id_pengiriman');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_invoice')->unsigned();
            $table->bigInteger('id_customer')->unsigned();
            $table->string('catatan_pengiriman');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_invoice')->references('id_invoice')->on('invoice');
            $table->foreign('id_customer')->references('id_customers')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_pengiriman');
    }
}
