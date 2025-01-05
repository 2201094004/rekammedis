<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan'; 
    protected $fillable = [
        'id_pasien',
        'id_rekam_medik',
        'nominal',
        'status',
        'sistem_pembayaran_id',
    ];

    public function pasien()
    {
        return $this->belongsTo(DataPasien::class, 'id_pasien');
    }

    public function rekamMedik()
    {
        return $this->belongsTo(RekamMedik::class, 'id_rekam_medik');
    }

    public function sistemPembayaran()
    {
        return $this->belongsTo(SistemPembayaran::class, 'sistem_pembayaran_id');
    }
}
