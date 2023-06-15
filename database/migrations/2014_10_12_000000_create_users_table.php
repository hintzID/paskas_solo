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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('member');
            $table->rememberToken();

            $table->timestamps();
        });

        // Set 'role' to 'admin' for the first user created
        $firstUser = \App\Models\User::first();
        if ($firstUser) {
            $firstUser->role = 'admin';
            $firstUser->save();
        }

        // Reference email from 'anggotas' table
        if (!$firstUser && Schema::hasTable('anggotas')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreign('email')->references('email')->on('anggotas')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['email']);
        });

        Schema::dropIfExists('users');
    }
};
