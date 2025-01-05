<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RekamMedikResource extends JsonResource
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
            'pasien' => new PasienResource($this->whenLoaded('pasien')),  // Menambahkan relasi pasien
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
