<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSubKomponen extends Model
{
    use HasFactory;

    protected $fillable = ['sub_komponen_id', 'nama', 'volume', 'satuan', 'harga_satuan', 'anggaran'];

    public function subKomponen()
    {
        return $this->belongsTo(SubKomponen::class);
    }
}
