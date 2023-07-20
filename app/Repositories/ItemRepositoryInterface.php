<?php

namespace App\Repositories;

use App\Http\Resources\ItemCollection;

interface ItemRepositoryInterface
{
    public function getAllItem(): ?ItemCollection;

    public function getItem(string $id): ?array;

    public function subtractStock(string $id, int $amount);
}
