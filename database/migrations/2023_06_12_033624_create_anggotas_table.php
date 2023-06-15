<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('kota_tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->enum('status', ['menikah', 'belum_menikah', 'janda', 'duda'])->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('no_telepon')->nullable();
            $table->boolean('verifikasi')->default(false);
            $table->enum('pilihan_kontribusi', ['cs', 'mkp', 'keuangan', 'fundraising', 'sdm', 'support', 'distributor'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};




            // $table->text('doa_harapan')->nullable();            
            // $table->text('komunitas_organisasi')->nullable();
            // $table->text('apa_yang_diketahui')->nullable();