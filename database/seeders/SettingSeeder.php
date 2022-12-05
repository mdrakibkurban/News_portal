<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'logo'       =>  null,
            'address_en' => 'Netrokona',
            'address_bn' => 'নেত্রকোনা',
            'phone_en'   => '01976009329',
            'phone_bn'   => '০১৯৭৬০০৯৩২৯',
            'copy_right' => 'All rights reserved © 2022 Daily News Paper',
            'email'      => 'admin@gmail.com'
        ]);
    }
}
