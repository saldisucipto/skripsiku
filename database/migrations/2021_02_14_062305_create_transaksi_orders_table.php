<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_orders', function (Blueprint $table) {
            $table->bigIncrements('id_trksi_order');
            $table->bigInteger('id_order')->unsigned()->nullable();
            $table->bigInteger('id_produk')->unsigned();
            $table->bigInteger('id_customer')->unsigned();
            $table->integer('qty_orders');
            $table->timestamps();
            $table->foreign('id_order')->references('id_order')->on('orders');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
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
        Schema::dropIfExists('transaksi_orders');
    }
}
