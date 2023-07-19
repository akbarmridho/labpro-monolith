<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Item extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'kode' => $this->kode,
            'perusahaan_id' => $this->perusahaan_id
        ];
    }
}
