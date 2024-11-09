<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()
            ->count(100)
            ->create();

        // 商品
        $products = Product::factory()
            ->count(30)
            ->create();

        // 購入履歴
        Transaction::factory()
            ->count(10000)
            ->setRelationIds($users->pluck('id')->toArray(), $products->pluck('id')->toArray())
            ->create();
    }
}
