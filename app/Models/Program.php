<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama_program',
         'total_anggaran',
        'tahun_anggaran',
    ];

    public function kros()
    {
        return $this->hasMany(Kro::class);
    }

    public function tahunAnggaran() {
    return $this->belongsTo(TahunAnggaran::class);
}
}
