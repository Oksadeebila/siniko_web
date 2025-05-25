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
    Schema::table('programs', function (Blueprint $table) {
        $table->foreignId('tahun_anggaran_id')->nullable()->constrained('tahun_anggarans')->cascadeOnDelete();
    });
}

public function down(): void
{
    Schema::table('programs', function (Blueprint $table) {
        $table->dropForeign(['tahun_anggaran_id']);
        $table->dropColumn('tahun_anggaran_id');
    });
}

};
