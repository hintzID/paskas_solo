<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePondokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pondok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hasil_survey_id');
            // $table->unsignedBigInteger('calon_mitra_id');
            $table->integer('rencana_jumlah_penyaluran');
            $table->string('cp');
            $table->string('cp_no_hp');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('hasil_survey_id')->references('id')->on('hasil_survey');
            // $table->foreign('calon_mitra_id')->references('id')->on('calon_mitra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop foreign key constraints first to avoid errors
        Schema::table('pondok', function (Blueprint $table) {
            $table->dropForeign(['hasil_survey_id']);
            // $table->dropForeign(['calon_mitra_id']);
        });

        // Drop the table
        Schema::dropIfExists('pondok');
    }
}
