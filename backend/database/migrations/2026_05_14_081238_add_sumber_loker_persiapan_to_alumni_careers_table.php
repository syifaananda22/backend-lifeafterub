<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alumni_careers', function (Blueprint $table) {
            $table->string('sumber_loker')->nullable()->after('deskripsi');
            $table->text('persiapan')->nullable()->after('sumber_loker');
        });
    }

    public function down(): void
    {
        Schema::table('alumni_careers', function (Blueprint $table) {
            $table->dropColumn(['sumber_loker', 'persiapan']);
        });
    }
};