<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagihanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pasien' => $this->pasien,  // Anda bisa menyesuaikan dengan relasi pasien
            'rekam_medik' => $this->rekamMedik, // Anda bisa menyesuaikan dengan relasi rekamMedik
            'sistem_pembayaran' => $this->sistemPembayaran, // Anda bisa menyesuaikan dengan relasi sistemPembayaran
            'nominal' => $this->nominal,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

