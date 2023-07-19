<?php

namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function getAllItem(): ?\Illuminate\Http\Resources\Json\AnonymousResourceCollection;

    public function getItem(string $id): ?array;

    public function subtractStock(string $id, int $amount);
}
