<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'name' => $faker->name,
                'image' => $faker->image('public/images/upload_faker', 400, 300, null, false),
                'price' => $faker->randomNumber(6),
                'quantity' => $faker->randomNumber(2),
                'category_id' => $faker->numberBetween($min = 1, $max = 10)
            ];
            DB::table('products')->insert($data);
        }
    }
}