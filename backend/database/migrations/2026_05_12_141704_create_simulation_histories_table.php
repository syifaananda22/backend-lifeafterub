<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('simulation_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->foreignId('career_id');

            $table->string('title');
            $table->timestamp('date');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('simulation_histories');
    }
};