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
            'fajr'    => '5:00',
            'johr'    => '1:30', 
            'asor'    => '4:00',
            'magrib'  => '5:10',
            'esha'    => '7:30',
            'jummah'  => '1:30'
        ]);
    }
}
