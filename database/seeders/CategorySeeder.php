<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            Category::create([
                'name' => $facker->unique()->name,
                'user_id' =>1,
                'status' => $this->randomStatus()
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
