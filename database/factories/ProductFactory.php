<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
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
    { $name=$this->faker->name;
        $category = Category::all()->pluck('id')->toArray();
$store=Store::all()->pluck('id')->toArray();

        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->sentence,
            'logo'=>$this->faker->imageUrl(300,300),
            'price'=>$this->faker->randomFloat(1,1,999),
            'compare_price'=>$this->faker->randomFloat(1,1,999),
            'category_id'=>$this->faker->randomElement($category),
            'store_id'=>$this->faker->randomElement($store),
            'feature'=>rand(0,1),
            'rating'=>$this->faker->randomFloat(),


        ];
    }
}
