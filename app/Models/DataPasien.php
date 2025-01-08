<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    use HasFactory;

    // Explicitly set the table name if it's not the plural form of the model
    protected $table = 'data_pasien';  // <-- Correct the table name here

    protected $fillable = [
        'nik', 'nama', 'alamat', 'nomor_telepon', 'jenis_kelamin', 'tanggal_lahir', 'keluarga_id'
    ];

    // Define relationships
    // public function keluhan()
    // {
    // return $this->belongsTo(Keluhan::class, 'keluhan_id');
    // }

    public function keluarga()
    {
        return $this->belongsTo(DataKeluarga::class, 'keluarga_id');
    }
}
