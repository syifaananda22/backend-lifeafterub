<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('field_id')
                ->constrained('career_fields')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('salary');

            $table->text('skill');
            $table->text('description');
            $table->text('tugas');
            $table->text('prospek');
            $table->text('tools');

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};