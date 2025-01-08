<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;

    // protected $fillable = ['deskripsi'];

    // // Define the relationship with DataPasien
    // public function dataPasien()
    // {
    //     return $this->hasMany(DataPasien::class, 'keluhan_id');
    // }
}
