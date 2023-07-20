<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemHistory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ItemHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemHistory query()
 * @mixin \Eloquent
 */
class ItemHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'price',
        'quantity',
        'item_company_name',
        'item_id',
        'user_id'
    ];
}
