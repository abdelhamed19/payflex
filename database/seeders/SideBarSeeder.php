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
        // id = 1
        DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'الصفحة الرئيسية',
                'en' => 'Home'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-home fe-16',
            'route' => '/admin/home',
            'route_name' => 'home',
        ]);
        // id = 2
        DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'السكاشن',
                'en' => 'Sections'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-layers fe-16',
            'route' => '/admin/sections/create',
            'route_name' => 'sections.create',
        ]);
        // id = 4
        DB::table('sidebars')->insert([
            'name' => json_encode([
                'ar' => 'الأدوار والصلاحيات',
                'en' => 'Roles & Permissions'
            ], JSON_UNESCAPED_UNICODE),
            'icon' => 'fe fe-lock fe-16',
            'route' => '/admin/roles',
        ]);
        // id = 5
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
            'sidebar_id' => 2, // sections
            'role_id' => 2,
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
