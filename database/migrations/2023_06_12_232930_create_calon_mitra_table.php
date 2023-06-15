<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_mitra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengurus_lembaga_id');
            $table->string('nama_pondok');
            $table->date('tanggal_berdiri');
            $table->string('alamat_lengkap'); 
            $table->string('sumber_dana_operasional');
            $table->integer('jumlah_pengurus_menetap');
            $table->integer('jumlah_pengurus_tidak_menetap');
            $table->timestamps();
            
            $table->foreign('pengurus_lembaga_id')->references('id')->on('pengurus_lembaga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calon_mitra');
    }
}


