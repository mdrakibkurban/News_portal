<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::create([
            'facebook'  => 'https://web.facebook.com/',
            'twitter'   => 'https://twitter.com/i/flow/login', 
            'youtube'   => 'https://www.youtube.com/',
            'instagram' => 'https://www.instagram.com/',
            'linkedin'  => 'https://www.linkedin.com/feed/'
        ]);
    }
}
