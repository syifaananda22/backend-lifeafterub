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
        Schema::create('alumni_careers', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('posisi');
        $table->string('perusahaan');
        $table->string('bidang');
        $table->string('fakultas');
        $table->string('prodi');
        $table->string('tahun_lulus');
        $table->string('foto')->nullable();
        $table->text('deskripsi')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_careers');
    }
};
