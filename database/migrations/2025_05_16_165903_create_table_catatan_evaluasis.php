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
        Schema::create('table_catatan_evaluasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('realisasi_bulanan_id')->constrained()->onDelete('cascade');
            $table->foreignId('tim_evaluasi_id')->constrained('users')->onDelete('cascade');
            $table->text('catatan');
            $table->enum('status', ['revisi', 'valid'])->default('revisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_catatan_evaluasis');
    }
};
