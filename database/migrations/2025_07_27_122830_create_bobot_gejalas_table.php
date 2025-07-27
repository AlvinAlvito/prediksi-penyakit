<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bobot_gejalas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gejala_id')->constrained()->onDelete('cascade');
            $table->foreignId('penyakit_id')->constrained()->onDelete('cascade');
            $table->float('bobot');
            $table->timestamps(); // << Tambahkan ini
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_gejalas');
    }
};
