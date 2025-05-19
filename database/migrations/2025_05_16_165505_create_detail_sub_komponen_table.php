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
        Schema::create('detail_sub_komponens', function (Blueprint $table) {
           $table->id();
            $table->foreignId('subkomponen_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->decimal('volume', 10, 2);
            $table->string('satuan');
            $table->decimal('harga_satuan', 20, 2);
            $table->decimal('anggaran', 20, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sub_komponen');
    }
};
