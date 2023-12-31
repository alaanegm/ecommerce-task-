<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::all()->each(function ($category) {
        //     Product::factory()->create([
        //         'category_id' => $category->id,
        //     ]);
        // });
        Product::factory()->count(20)->create();

    }
}
