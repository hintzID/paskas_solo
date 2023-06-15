<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripPenyaluranDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_penyaluran_donasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('pondok_id');
            $table->unsignedBigInteger('donasi_masuk_id')->nullable();
            $table->timestamps();

            $table->foreign('trip_id')->references('id')->on('trip')->onDelete('cascade');
            $table->foreign('pondok_id')->references('id')->on('pondok')->onDelete('cascade');
            $table->foreign('donasi_masuk_id')->references('id')->on('donasi_masuk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_penyaluran_donasi');
    }
}
