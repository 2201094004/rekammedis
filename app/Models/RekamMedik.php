<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedik extends Model
{
    use HasFactory;

    protected $table = 'rekam_medik'; 
    protected $fillable = [
        'id_pasien',
        'diagnosa',
        // 'resep',
        'keluhan',
        'dokter_id',
    ];

    // Relasi ke tabel Pasien
    public function pasien()
    {
        return $this->belongsTo(DataPasien::class, 'id_pasien');
    }

    // Relasi ke tabel Dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id'); 
    }
}
