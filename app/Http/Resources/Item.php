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
            'id' => $this->resource['id'],
            'nama' => $this->resource['nama'],
            'harga' => $this->resource['harga'],
            'stok' => $this->resource['stok'],
            'kode' => $this->resource['kode'],
            'perusahaan_id' => $this->resource['perusahaan_id']
        ];
    }
}
