<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakAsuhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak_asuh', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_tk')->nullable();
            $table->integer('jumlah_sd')->nullable();
            $table->integer('jumlah_smp')->nullable();
            $table->integer('jumlah_sma')->nullable();
            $table->integer('jumlah_kuliah')->nullable();
            $table->unsignedBigInteger('keterangan_anak_asuh_id')->nullable();
            $table->unsignedBigInteger('calon_mitra_id')->nullable();
            $table->timestamps();

            $table->foreign('keterangan_anak_asuh_id')->references('id')->on('keterangan_anak_asuh')->onDelete('cascade');
            $table->foreign('calon_mitra_id')->references('id')->on('calon_mitra')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anak_asuh');
    }
}

