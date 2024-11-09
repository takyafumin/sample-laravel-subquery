<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * 購入履歴 Factory
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * ユーザ ID のリスト
     *
     * @var array<int, int>
     */
    protected array $userIds = [];

    /**
     * 商品 ID のリスト
     *
     * @var array<int, int>
     */
    protected array $productIds = [];

    /**
     * ユーザ ID と商品 ID を設定
     *
     * @param  array<int, int>  $productIds  商品 ID のリスト
     * @param  array<int, int>  $productIds  商品 ID のリスト
     * @return self
     */
    public function setRelationIds(array $userIds, array $productIds)
    {
        $this->userIds = $userIds;
        $this->productIds = $productIds;

        return $this;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // リストが空でないことを確認
        if (empty($this->userIds) || empty($this->productIds)) {
            throw new \Exception('User IDs or Product IDs are not set.');
        }

        return [
            'user_id' => $this->faker->randomElement($this->userIds),
            'product_id' => $this->faker->randomElement($this->productIds),
            'buy_at' => $this->faker->dateTime,
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 10000),
        ];
    }
}
