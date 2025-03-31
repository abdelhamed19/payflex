<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SideBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'الصفحة الرئيسية',
                'en' => 'Home'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-home fe-16',
            'route' => '/',
            'route_name' => 'home',
        ]);
        DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'السكاشن',
                'en' => 'Sections'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-layers fe-16',
            'route' => '/sections/create',
            'route_name' => 'sections.create',
        ]);
        DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'جغرافيا',
                'en' => 'Geography'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-globe fe-16',
        ]);
        DB::table('sidebar_childrens')->insert([
            'sidebar_id' => 3,
            'name' => json_encode([
                'ar' => 'الدول',
                'en' => 'Countries'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-globe fe-16',
            'route' => '/countries',
            'route_name' => 'countries.index',
        ]);
        DB::table('sidebar_childrens')->insert([
            'sidebar_id' => 3,
            'name' => json_encode([
                'ar' => 'المناطق',
                'en' => 'Regions'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-map-pin fe-16',
            'route' => '/regions',
            'route_name' => 'regions.index',
        ]);
        DB::table('sidebar_childrens')->insert([
            'sidebar_id' => 3,
            'name' => json_encode([
                'ar' => 'المدن',
                'en' => 'Cities'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-map fe-16',
            'route' => '/cities',
            'route_name' => 'cities.index',
        ]);
    }
}
