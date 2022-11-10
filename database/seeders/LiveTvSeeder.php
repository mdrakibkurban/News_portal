<?php

namespace Database\Seeders;

use App\Models\LiveTv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LiveTvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LiveTv::create([
            'embed_code' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/QGbGyhVzpJk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'status'     => 1, 
        ]);
    }
}
