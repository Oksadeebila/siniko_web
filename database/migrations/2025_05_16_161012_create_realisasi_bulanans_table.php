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
        Schema::create('realisasi_bulanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rincian_output_id')->constrained()->cascadeOnDelete();
            $table->year('tahun');
            $table->unsignedTinyInteger('bulan'); // 1-12
            $table->decimal('volume', 10, 2)->default(0);
            $table->decimal('progres', 5, 2)->default(0); // persen fisik
            $table->decimal('realisasi_anggaran', 20, 2)->default(0);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasi_bulanans');
    }
};
