<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Factory::create();

        foreach (range(1,10) as $item) {
            SubCategory::create([
                'name_en' => $facker->unique()->name,
                'name_bn' => $facker->unique()->name,
                'user_id'     => 1,
                'category_id' => rand(1,10),
                'status'      => $this->randomStatus()
            ]);
        }
    }

    public function randomStatus(){
        $status = [
            '0' => 0,
            '1' => 1
        ];

        return array_rand($status);
   }
}
