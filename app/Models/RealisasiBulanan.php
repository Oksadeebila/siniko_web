<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiBulanan extends Model
{
    use HasFactory;

    protected $fillable = ['rincian_output_id', 'tahun', 'bulan', 'volume', 'progres', 'realisasi_anggaran', 'keterangan'];

    // Relasi: satu RealisasiBulanan milik satu RincianOutput
    public function rincianOutput()
    {
        return $this->belongsTo(RincianOutput::class);
    }
}
