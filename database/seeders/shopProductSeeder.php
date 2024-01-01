<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class shopProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = DB::table('shops')->pluck('id')->all();
        $products = DB::table('products')->pluck('id')->all();

        foreach (range(1, 20) as $index) {
            DB::table('product_shop')->insert([
                'shop_id' => $this->getRandomValue($shops),
                'product_id' => $this->getRandomValue($products),
            ]);
        }
    }

    
    private function getRandomValue(array $array)
    {
        return $array[array_rand($array)];
    }
}
