<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Sidebar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            RegionSeeder::class,
            CitySeeder::class,
        ]);
        Sidebar::create([
            'name' => json_encode([
                'ar' => 'الصفحة الرئيسية',
                'en' => 'Home'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-home fe-16',

        ]);
        Sidebar::create([
            'name' => json_encode([
                'ar' => 'الدول',
                'en' => 'Countries'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-globe fe-16',
            'route' => '/countries',
            'route_name' => 'countries.index',
        ]);
    }
}
