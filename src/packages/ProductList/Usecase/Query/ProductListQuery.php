<?php

declare(strict_types=1);

namespace Packages\ProductList\Usecase\Query;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\CarbonImmutable;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Packages\ProductList\Usecase\Dto\ProductListItemDto;

/**
 * 商品一覧取得クエリ
 */
class ProductListQuery
{
    /**
     * 取得
     *
     * @return Collection<ProductListItemDto>
     */
    public function get(): Collection
    {
        $txQuery = Transaction::query()
            ->select([
                'product_id',
                DB::raw('count(user_id) as user_count'),
                DB::raw('max(buy_at) as latest_buy_at'),
            ])
            ->groupBy('product_id');

        $query = Product::query()
            ->joinSub($txQuery, 'tx', function (JoinClause $join) {
                $join->on('products.id', '=', 'tx.product_id');
            })
            ->select([
                'products.id',
                'products.name',
                'products.price',
                'tx.user_count',
                'tx.latest_buy_at',
            ]);

        return $query
            ->get()
            ->map(function ($product) {
                return new ProductListItemDto(
                    $product->id,
                    $product->name,
                    $product->price,
                    $product->user_count,
                    CarbonImmutable::parse($product->latest_buy_at),
                );
            });
    }
}
