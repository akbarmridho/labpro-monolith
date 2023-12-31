<?php

namespace App\Repositories;

use App\Http\Resources\Company;
use App\Http\Resources\Item;
use App\Http\Resources\ItemCollection;
use Illuminate\Support\Facades\Http;

class ItemRepository implements ItemRepositoryInterface
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('SINGLE_BASE_URL', 'http://localhost:3000');
    }

    public function getAllItem(): ?ItemCollection
    {
        $response = Http::baseUrl($this->baseUrl)->get('barang');

        if ($response->ok()) {
            return ItemCollection::make($response->json('data'));
        }

        return null;
    }

    public function getItem(string $id): ?array
    {
        $responseItem = Http::baseUrl($this->baseUrl)->get('barang/' . $id);

        if (!$responseItem->ok()) {
            return null;
        }

        $item = Item::make($responseItem->json('data'));

        $responseCompany = Http::baseUrl($this->baseUrl)->get('perusahaan/' . $item->resource['perusahaan_id']);

        if (!$responseCompany->ok()) {
            return null;
        }

        $company = Company::make($responseCompany->json('data'));

        return [
            'item' => $item,
            'company' => $company
        ];
    }

    public function subtractStock(string $id, int $amount)
    {
        $responseItem = Http::baseUrl($this->baseUrl)->get('barang/' . $id);

        if (!$responseItem->ok()) {
            return null;
        }

        $item = Item::make($responseItem->json('data'));

        $responseUpdate = Http::baseUrl($this->baseUrl)->put('barang/' . $id, [
            'nama' => $item->resource['nama'],
            'harga' => $item->resource['harga'],
            'stok' => $item->resource['stok'] - $amount,
            'kode' => $item->resource['kode'],
            'perusahaan_id' => $item->resource['perusahaan_id']
        ]);

        return $responseUpdate->ok();
    }
}
