<?php

namespace Database\Seeders;

use App\Models\Namaz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NamazSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Namaz::create([
            'fojor_en'    => '5:00 AM',
            'johr_en'    => '1:30 PM', 
            'asor_en'    => '4:00 PM',
            'magrib_en'  => '5:10 PM',
            'esha_en'    => '7:30 PM',
            'jummah_en'  => '1:30 PM',
            'fojor_bn'    => '৫:০০ পূর্বাহ্ন',
            'johr_bn'    => '১:৩০ অপরাহ্ন', 
            'asor_bn'    => '৪:০০ অপরাহ্ন',
            'magrib_bn'  => '৫:০০ অপরাহ্ন',
            'esha_bn'    => '৭:৩০ অপরাহ্ন',
            'jummah_bn'  => '১:৩০ অপরাহ্ন',
        ]);
    }
}
