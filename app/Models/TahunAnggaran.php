<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAnggaran extends Model
{
    use HasFactory;

    protected $fillable = ['tahun']; // atau pakai guarded kosong: protected $guarded = [];

    // Relasi ke Program (jika program punya `tahun_anggaran_id`)
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    // Relasi ke RincianOutput (jika rincian_output punya `tahun_anggaran_id`)
    public function rincianOutputs()
    {
        return $this->hasMany(RincianOutput::class);
    }
}
