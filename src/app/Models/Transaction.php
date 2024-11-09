<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 購入履歴 Model
 *
 * @extends \Illuminate\Database\Eloquent\Model
 */
class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    /**
     * リレーション：ユーザ
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * リレーション：商品
     */
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
