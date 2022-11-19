<?php

namespace Database\Seeders;

use App\Models\Division;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Factory::create();

        foreach (range(1,8) as $item) {
            Division::create([
                'name_en' => $facker->unique()->name,
                'name_bn' => $facker->unique()->name,
                'user_id' =>1,
            ]);
        }
    }
}
