<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'type' => 1,
            'category' => 1,
            'division' => 1,
            'news'     => 1,
            'setting'  => 1,
            'gallery'  => 1,
            'ads'      => 1,
            'role'     => 1,  
        ]);
    }
}
