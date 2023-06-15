<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_survey', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_mitra_id');
            $table->string('tingkat_layak');
            $table->string('prioritas');
            $table->string('verifikasi')->default(false);

            $table->foreign('calon_mitra_id')->references('id')->on('calon_mitra')->onDelete('cascade');
            
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
        Schema::dropIfExists('hasil_survey');
    }
}
