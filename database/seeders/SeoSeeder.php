<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seo::create([
            'meta_author'         => 'news portal wibesite',
            'meta_title'          => 'news portal,news site', 
            'meta_keyword'        => ' newspaper script, magazine, Blog',
            'meta_description'    => 'The meta description of your page has a length of 154',
            'google_analytics'    => 'Google Analytics lets you measure your advertising ROI',
            'google_verification' => 'Ownership verification means to Search Console specific',
            'alexa_analytics'     => 'We retired Alexa.com on May 1, 202/'
        ]);
    }
}
