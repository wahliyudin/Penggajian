<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGaji extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'potongan',
        'total_gaji',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
