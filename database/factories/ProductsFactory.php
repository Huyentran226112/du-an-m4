<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                'name' => fake()->name,
                'price' => mt_rand(1,100),
                'quantity' => mt_rand(100,1000),
                'category_id' => Category::all()->random()->id,
                'description' =>  Str::random(100),
                'image' => fake()->image,
                'status' => mt_rand(0,1),

        ];
    }
}
