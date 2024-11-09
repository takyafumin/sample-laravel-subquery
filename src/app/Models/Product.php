<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 商品 Model
 *
 * @extends \Illuminate\Database\Eloquent\Model
 */
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * リレーション：購入履歴
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
