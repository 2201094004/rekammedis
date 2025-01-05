<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HasilLabResource extends JsonResource
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
            'pasien' => [
                'id' => $this->pasien->id,
                'nama' => $this->pasien->nama,
            ],
            'dokter' => $this->dokter ? [
                'id' => $this->dokter->id,
                'nama' => $this->dokter->nama,
            ] : null,
            'hasil' => $this->hasil,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
