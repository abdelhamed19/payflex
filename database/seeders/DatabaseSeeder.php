<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Sidebar;
use App\Models\SidebarChildren;
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
            SideBarSeeder::class,
            // OrderSeeder::class,
        ]);
    }
}
