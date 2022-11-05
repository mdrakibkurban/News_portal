<?php

namespace Database\Seeders;

use App\Models\District;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
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
            District::create([
                'district_en' => $facker->unique()->name,
                'district_bn' => $facker->unique()->name,
                'user_id' =>1,
            ]);
        }
    }
}
