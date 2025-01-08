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
        'nama_obat_id',  
        'dosis',
        'petunjuk',
        'dokter_id',     
    ];

    /**
     * Relasi ke model RekamMedik
     */
    public function rekamMedik()
    {
        return $this->belongsTo(RekamMedik::class, 'id_rekam_medik');
    }

    /**
     * Relasi ke model NamaObat
     */
    public function namaObat()
    {
        return $this->belongsTo(NamaObat::class, 'nama_obat_id');
    }

    /**
     * Relasi ke model Dokter
     */
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
