<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::create(['name' => 'Electronics']);
        // Category::create(['name' => 'Clothing']);
        
        // // Add subcategories
        // $electronics = Category::where('name', 'Electronics')->first();
        // Category::create(['name' => 'Mobile Phones', 'parent_id' => $electronics->id]);
        // Category::create(['name' => 'Laptops', 'parent_id' => $electronics->id]);

        // Category::create(['name' => 'Men\'s Clothing', 'parent_id' => 2]);
        // Category::create(['name' => 'Women\'s Clothing', 'parent_id' => 2]);
        $rootCategories =Category::factory()->count(5)->create();
        
        foreach ($rootCategories as $rootCategory) {
            $this->createChildCategories($rootCategory, 2); // Change 2 to the desired number of levels
        }

    }

    private function createChildCategories($parentCategory, $levels)
    {
        if ($levels <= 0) {
            return;
        }

        $childCategories = Category::factory(3)->create([
            'parent_id' => $parentCategory->id,
        ]);

        foreach ($childCategories as $childCategory) {
            $this->createChildCategories($childCategory, $levels - 1);
        }
    }
}
