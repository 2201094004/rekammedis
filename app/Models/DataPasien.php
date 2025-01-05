<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    use HasFactory;

    protected $table = 'data_pasien';

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'nomor_telepon',
        'jenis_kelamin',
        'tanggal_lahir',
        'keluarga_id',
    ];

    // Relasi ke DataKeluarga
    public function keluarga()
    {
        return $this->belongsTo(DataKeluarga::class, 'keluarga_id');
    }
}
