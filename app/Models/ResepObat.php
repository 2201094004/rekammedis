<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;

    protected $table = 'resep_obat';

    protected $fillable = [
        'id_rekam_medik',
        'nama_obat',
        'dosis',
        'petunjuk',
    ];

    public function rekamMedik()
    {
        return $this->belongsTo(RekamMedik::class, 'id_rekam_medik');
    }
}
