<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanEvaluasi extends Model
{
    use HasFactory;

    protected $fillable = ['realisasi_bulanan_id', 'tim_evaluasi_id', 'catatan', 'status'];

    public function realisasiBulanan()
    {
        return $this->belongsTo(RealisasiBulanan::class);
    }

    public function timEvaluasi()
    {
        return $this->belongsTo(User::class, 'tim_evaluasi_id');
    }
}
