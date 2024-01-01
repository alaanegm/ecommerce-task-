<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shop;
class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shop1 = Shop::create(['name' => 'shop1']);
        $shop2 = Shop::create(['name' => 'shop2']);
        $shop3 = Shop::create(['name' => 'shop3']);
    }
}
