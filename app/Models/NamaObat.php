<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaObat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nama_obat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_obat',
        'kategori',
        'keterangan',
    ];

    /**
     * Get the resep obat that uses this nama obat.
     */
    public function resepObat()
    {
        return $this->hasMany(ResepObat::class, 'nama_obat_id', 'id');
    }
}
