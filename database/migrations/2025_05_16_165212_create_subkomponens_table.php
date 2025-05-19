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
        Schema::create('subkomponens', function (Blueprint $table) {
            $table->id();
             $table->foreignId('komponen_id')->constrained()->onDelete('cascade');
            $table->string('kode');
            $table->string('nama');
            $table->decimal('anggaran', 20, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subkomponen');
    }
};
