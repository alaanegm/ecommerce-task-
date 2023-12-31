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
      
         // Level 1 Categories
         $category1 = Category::create(['name' => 'Electronics']);
         $category2 = Category::create(['name' => 'Clothing']);
         $category3 = Category::create(['name' => 'Books']);
         $category4 = Category::create(['name' => 'Home and Furniture']);
         $category5 = Category::create(['name' => 'Toys']);
 
         // Level 2 Subcategories
         $category1_1 = $category1->children()->create(['name' => 'Laptops']);
         $category1_2 = $category1->children()->create(['name' => 'Smartphones']);
         
         $category2_1 = $category2->children()->create(['name' => 'Men\'s Clothing']);
         $category2_2 = $category2->children()->create(['name' => 'Women\'s Clothing']);
         
         $category3_1 = $category3->children()->create(['name' => 'Fiction']);
         $category3_2 = $category3->children()->create(['name' => 'Non-Fiction']);
 
         // Add more subcategories as needed
 
         // Level 3 Sub-subcategories
         $category1_1_1 = $category1_1->children()->create(['name' => 'Gaming Laptops']);

     }
}
