<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prodact>
 */
class ProdactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->title,
            'title'=>fake()->title,
            'image'=>'images/B827f4bVp343UFGgTawq9pTFZITWWjQxcZgrOWIt.jpg',
            'price'=>random_int(1000,10000),
            'discount'=>10,
            'brand_id'=>4,
            
        ];
    }
}
