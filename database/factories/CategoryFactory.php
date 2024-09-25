<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name=$this->faker->name;

        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->sentence(16),
//       'parent_id'=>$this->faker->randomNumber(10),
            'logo'=>$this->faker->imageUrl,
//            'status'=>$this->faker->randomElement(['active, archived'])



        ];
    }
}
