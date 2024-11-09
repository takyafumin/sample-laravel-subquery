<?php

declare(strict_types=1);

namespace Packages\ProductList\Usecase;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Packages\ProductList\Usecase\Dto\ProductListItemDto;
use Packages\ProductList\Usecase\Query\ProductListQuery;

/**
 * 商品一覧検索 ユースケース
 */
class ProductListSearchUsecase
{
    public function __construct(
        private ProductListQuery $productListQuery
    ) {}

    /**
     * 検索
     *
     * @return array{data: Collection<ProductListItemDto>, queryLog: array}
     */
    public function exec(): array
    {
        // クエリログの有効化
        DB::enableQueryLog();

        // 商品一覧を取得
        $items = $this->productListQuery->get();

        // クエリログ取得
        $queryLog = DB::getQueryLog();

        return [
            'data' => $items,
            'queryLog' => $queryLog,
        ];
    }
}
