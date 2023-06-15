<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKondisiPondokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisi_pondok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fasilitas_pondok_id');
            $table->unsignedBigInteger('calon_mitra_id');
            $table->integer('jumlah');
            $table->string('kondisi');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('fasilitas_pondok_id')->references('id')->on('fasilitas_pondok')->onDelete('cascade');
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
        Schema::dropIfExists('kondisi_pondok');
    }
}
