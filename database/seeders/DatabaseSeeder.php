<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            DivisionSeeder::class,
            SocialSeeder::class,
            SeoSeeder::class,
            NamazSeeder::class,
            LiveTvSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
