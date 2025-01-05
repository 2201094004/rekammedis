<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;

    protected $table = 'data_keluarga';

    protected $fillable = [
        'no_kk',
        'nama_kepala_keluarga',
        'alamat',
    ];

    public function pasien()
    {
        return $this->hasMany(DataPasien::class, 'keluarga_id');
    }
}
