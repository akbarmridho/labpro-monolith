<?php

namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function getAllItem();

    public function getItem(string $id);

    public function subtractStock(string $id, int $amount);
}
