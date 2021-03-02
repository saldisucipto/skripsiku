<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id_invoice');
            $table->bigInteger('id_metode_pembayaran')->unsigned();
            $table->bigInteger('id_customer')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->double('jumlah_pembayaran');
            $table->date('tanggal');
            $table->tinyInteger('terverifikasi')->default(0);
            $table->date('tanggal_verifikasi')->nullable();
            $table->string('verify_by')->nullable();

            $table->foreign('id_metode_pembayaran')->references('id_metode')->on('metode_pembayaran');
            $table->foreign('id_customer')->references('id_customers')->on('customers');
            $table->foreign('id_user')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
