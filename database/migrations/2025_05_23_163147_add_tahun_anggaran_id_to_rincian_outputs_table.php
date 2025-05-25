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
        Schema::table('rincian_outputs', function (Blueprint $table) {
            Schema::table('rincian_outputs', function (Blueprint $table) {
            $table->foreignId('tahun_anggaran_id')
                ->after('kro_id') // atau sesuaikan posisi kolom
                ->nullable() // atau hapus jika wajib
                ->constrained()
                ->cascadeOnDelete();
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rincian_outputs', function (Blueprint $table) {
            $table->dropForeign(['tahun_anggaran_id']);
            $table->dropColumn('tahun_anggaran_id');
        });
    }
};
