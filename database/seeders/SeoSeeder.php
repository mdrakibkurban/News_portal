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
            'meta_author'         => 'Daliy News',
            'meta_title'          => 'Daliy News', 
            'meta_keyword'        => 'newspaper script, magazine, Blog, sports, opinion',
            'meta_description'    => 'বাংলাদেশসহ বিশ্বের সর্বশেষ সংবাদ শিরোনাম, প্রতিবেদন, বিশ্লেষণ, খেলা, বিনোদন, চাকরি, ',
            'google_analytics'    => 'Google Analytics lets you measure your advertising ROI',
            'google_verification' => 'Ownership verification means to Search Console specific',
            'alexa_analytics'     => 'We retired Alexa.com on May 1, 202/'
        ]);
    }
}
