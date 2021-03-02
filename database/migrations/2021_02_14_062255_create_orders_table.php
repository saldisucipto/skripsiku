<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->bigInteger('id_pengiriman')->unsigned();
            $table->bigInteger('id_customer')->unsigned();
            $table->bigInteger('id_invoice')->unsigned();
            $table->string('catatan', 191);
            $table->double('sub_total');
            $table->double('ppn');
            $table->double('total');
            $table->timestamps();
            // relations
            // $table->foreign('id_trksi_order')->references('id_trksi_order')->on('transaksi_orders');
            $table->foreign('id_pengiriman')->references('id_metode_pengiriman')->on('metode_pengiriman');
            $table->foreign('id_customer')->references('id_customers')->on('customers');
            $table->foreign('id_invoice')->references('id_invoice')->on('invoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
