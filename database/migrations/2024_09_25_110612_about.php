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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('roles');
            $table->text('brfabout');
            $table->date('DOB');
            $table->string('phone');
            $table->string('degree');
            $table->string('city');
            $table->string('email');
            $table->string('profile_photo_path', 2048);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
