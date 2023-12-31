<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\Category;
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
    protected $model = Product::class;

    public function definition()
    {
        $imagePath = $this->faker->image(public_path('images'), 400, 300, null, false);

        return [
            
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => 'images/' . basename($imagePath),
            'price' => $this->faker->numberBetween(10, 1000),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
