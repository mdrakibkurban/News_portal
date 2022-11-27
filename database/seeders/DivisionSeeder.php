<?php

namespace Database\Seeders;

use App\Models\Division;
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
       
            Division::create([
                'name_en' => 'Dhaka',
                'name_bn' => 'ঢাকা',
                'user_id' =>1,
            ]);
            
            Division::create([
                'name_en' => 'Mymensingh',
                'name_bn' => 'ময়মনসিংহঃ',
                'user_id' =>1,
            ]);

            Division::create([
                'name_en' => 'Khulna',
                'name_bn' => 'খুলনা',
                'user_id' =>1,
            ]);
            
            Division::create([
                'name_en' => 'Rangpur',
                'name_bn' => 'রংপুর',
                'user_id' =>1,
            ]); 

    }
}
