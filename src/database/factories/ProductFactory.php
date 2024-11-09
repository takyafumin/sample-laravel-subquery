<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * 商品 Factory
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->uuid(),
            'name' => '商品：'.$this->faker->realText(10),
            'price' => $this->faker->numberBetween(100, 10000),
            'image' => $this->faker->imageUrl(),
            'published_at' => $this->faker->dateTime,
        ];
    }
}
