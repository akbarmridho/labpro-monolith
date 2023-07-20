<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
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
            'alamat' => $this->resource['alamat'],
            'no_telp' => $this->resource['no_telp'],
            'kode' => $this->resource['kode']
        ];
    }
}
