<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'kode',
        'nama_kegiatan',
        'total_anggaran',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function kros()
    {
        return $this->hasMany(Kro::class);
    }
}
