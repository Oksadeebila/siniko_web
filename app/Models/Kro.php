<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kro extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'kode',
        'nama_kro',
        'volume',
        'satuan',
        'total_anggaran',
    ];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    // public function program()
    // {
    //     return $this->belongsTo(Program::class);
    // }

    public function rincianOutputs()
    {
        return $this->hasMany(RincianOutput::class);
    }
// buat mastiin kodenya bisa di gabung 
    protected static function booted()
{
    static::saving(function ($kro) {
        if ($kro->activity_id && $kro->kode_suffix) {
            $activity = \App\Models\Activity::find($kro->activity_id);
            $kro->kode = $activity->kode . '.' . $kro->kode_suffix;
        }
    });
}
}
