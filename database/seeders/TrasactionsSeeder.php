<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrasactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 150; $i++) {
            Transaction::create([
                'type_id' => rand(1001, 1002),
                'category_id' => rand(1, 15),
                'subcategory_id' => rand(1, 25),
                'amount' => rand(1, 500000),
                'about' => $faker->sentence(),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
