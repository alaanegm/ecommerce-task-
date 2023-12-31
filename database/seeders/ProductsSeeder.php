<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Assuming you have categories in the Categories table

        // Get all category IDs
        // $categoryIDs = DB::table('categories')->pluck('id')->toArray();

        // // Generate 20 products
        // for ($i = 1; $i <= 20; $i++) {
        //     $categoryID = $faker->randomElement($categoryIDs);

        //     DB::table('products')->insert([
        //         'name' => $faker->word,
        //         'description' => $faker->sentence,
        //         'image' => $faker->imageUrl(200, 200, 'products', true),
        //         'price' => rand(10, 1000) / 10.0, // Random cost between 1 and 100
        //         'category_id' => $categoryID,
        //     ]);
        // }
        Product::factory()->count(10)->create();
    }
}
