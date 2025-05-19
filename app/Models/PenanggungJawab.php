<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawab extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'rincian_output_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rincianOutput()
    {
        return $this->belongsTo(RincianOutput::class);
    }
}
