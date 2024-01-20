<?php

use Database\Seeders\UserSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
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
            $table->string('login')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('parentname');
            $table->string('phone');
            $table->string('password');
            $table->string('email')->unique();
            $table->foreignId('id_role')->references('id')->on('roles');
            $table->timestamps();
        });

        Artisan::call('db:seed', ['--class'=> UserSeeder::class]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
