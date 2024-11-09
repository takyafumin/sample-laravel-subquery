<?php

declare(strict_types=1);

namespace Packages\ProductList\Usecase\Dto;

use Carbon\CarbonImmutable;

/**
 * 商品リストアイテム DTO
 */
class ProductListItemDto
{
    /**
     * @param int $id ID
     * @param string $name 商品名
     * @param int $price 価格
     * @param int $userCount 購入者数
     * @param CarbonImmutable $latestBuyDate 最新購入日
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $price,
        public readonly int $userCount,
        public readonly CarbonImmutable $latestBuyDate,
    ) {}
}
