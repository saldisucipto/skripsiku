<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NavigasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // crate table Nvigasi
        Schema::create('navigasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_parent')->unsigned()->nullable();
            $table->string('title', 50);
            $table->string('link', 50);
            $table->timestamps();
            // deklare relations with table
            $table->foreign('id_parent')->references('id')->on('parent_navigasi');
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
