<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemPembayaran extends Model
{
    use HasFactory;

    protected $table = 'sistem_pembayaran';
    protected $fillable = ['nama_pembayaran', 'deskripsi'];

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
}