<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianOutput extends Model
{
    use HasFactory;

    // Jika ingin, tambahkan fillable agar bisa mass assign
    protected $fillable = ['kro_id', 'kode', 'nama_rincian_output', 'volume', 'satuan', 'total_anggaran'];

    // Relasi: satu RincianOutput punya banyak RealisasiBulanan
    public function realisasiBulanans()
    {
        return $this->hasMany(RealisasiBulanan::class);
    }
    // relasi kro dengan rincian output 
    public function kro() {
        return $this->belongsTo(Kro::class);
    } 

    public function tahunAnggaran() {
    return $this->belongsTo(TahunAnggaran::class); }

    
}
