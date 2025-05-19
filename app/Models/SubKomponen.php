<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKomponen extends Model
{
    use HasFactory;

    protected $fillable = ['komponen_id', 'kode', 'nama', 'anggaran'];

    public function komponen()
    {
        return $this->belongsTo(Komponen::class);
    }

    public function detailSubKomponen()
    {
        return $this->hasMany(DetailSubKomponen::class);
    }

}
