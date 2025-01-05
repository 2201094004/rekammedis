<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilLab extends Model
{
    use HasFactory;

    protected $table = 'hasil_lab';

    protected $fillable = [
        'id_pasien',
        'hasil',
        'dokter_id',
    ];

    /**
     * Relasi ke model DataPasien.
     */
    public function pasien()
    {
        return $this->belongsTo(\App\Models\DataPasien::class, 'id_pasien');
    }

    /**
     * Relasi ke model Dokter.
     */
    public function dokter()
    {
        return $this->belongsTo(\App\Models\Dokter::class, 'dokter_id');
    }
}
