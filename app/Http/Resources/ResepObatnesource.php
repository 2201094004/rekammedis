<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResepObatResource extends JsonResource
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
            'rekam_medik' => [
                'id' => $this->rekamMedik->id,
                'nama_pasien' => $this->rekamMedik->pasien->nama,
            ],
            'nama_obat' => $this->nama_obat,
            'dosis' => $this->dosis,
            'petunjuk' => $this->petunjuk,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
