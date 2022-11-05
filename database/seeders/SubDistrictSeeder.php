<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Factory::create();

        foreach (range(1,20) as $item) {
            SubDistrict::create([
                'subdistrict_en' => $facker->unique()->name,
                'subdistrict_bn' => $facker->unique()->name,
                'user_id' =>1,
                'district_id' => rand(1,8)
            ]);
        }
    }
}
