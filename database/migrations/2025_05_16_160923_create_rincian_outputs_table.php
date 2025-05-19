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
        Schema::create('rincian_outputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kro_id')->constrained()->cascadeOnDelete();
            $table->string('kode')->unique();
            $table->string('nama_rincian_output');
            $table->decimal('volume', 10, 2)->default(0);
            $table->string('satuan');
            $table->decimal('total_anggaran', 20, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rincian_outputs');
    }
};
