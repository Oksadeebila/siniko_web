<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;
    protected $fillable = ['rincian_output_id', 'kode', 'nama', 'anggaran'];

    public function rincianOutput()
    {
        return $this->belongsTo(RincianOutput::class);
    }

    public function subKomponens()
    {
        return $this->hasMany(SubKomponen::class);
    }
}
