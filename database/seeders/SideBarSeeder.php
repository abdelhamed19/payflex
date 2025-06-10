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
            'route' => '/admin/home',
            'route_name' => 'home',
        ]);
        DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'السكاشن',
                'en' => 'Sections'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-layers fe-16',
            'route' => '/admin/sections/create',
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
            'route' => '/admin/countries',
            'route_name' => 'countries.index',
        ]);
        DB::table('sidebar_childrens')->insert([
            'sidebar_id' => 3,
            'name' => json_encode([
                'ar' => 'المناطق',
                'en' => 'Regions'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-map-pin fe-16',
            'route' => '/admin/regions',
            'route_name' => 'regions.index',
        ]);
        DB::table('sidebar_childrens')->insert([
            'sidebar_id' => 3,
            'name' => json_encode([
                'ar' => 'المدن',
                'en' => 'Cities'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-map fe-16',
            'route' => '/admin/cities',
            'route_name' => 'cities.index',
        ]);
        DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'الأدوار والصلاحيات',
                'en' => 'Roles & Permissions'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-lock fe-16',
            'route' => '/admin/roles',
        ]);
                DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'شارتات',
                'en' => 'charts'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-lock fe-16',
            'route' => '/admin/charts',
        ]);
        DB::table('sidebar_role')->insert([
            'sidebar_id' => 2, // sections
            'role_id' => 1,
        ]);
        DB::table('sidebar_role')->insert([
            'sidebar_id' => 1, // home
            'role_id' => 1,
        ]);
        DB::table('sidebar_role')->insert([
            'sidebar_id' => 1, // home
            'role_id' => 2,
        ]);
        DB::table('sidebar_role')->insert([
            'sidebar_id' => 1, // home
            'role_id' => 3,
        ]);
        DB::table('sidebar_role')->insert([
            'sidebar_id' => 1, // home
            'role_id' => 4,
        ]);
        DB::table('sidebar_role')->insert([
            'sidebar_id' => 4, // roles
            'role_id' => 1,
        ]);
        DB::table('sidebar_role')->insert([
            'sidebar_id' => 4, // roles
            'role_id' => 2,
        ]);
    }
}
