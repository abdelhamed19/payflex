<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = storage_path('json/regions.json');
        if(file_exists($jsonFile)){
            $regions = json_decode(file_get_contents($jsonFile));
            foreach($regions as $region)
            {
                DB::table('regions')->insert([
                    'country_id' => $region->country_id,
                    'name' => json_encode([
                        'ar' => $region->name_ar,
                        'en' =>$region->name_en,
                    ],JSON_UNESCAPED_UNICODE),
                    'center' => json_encode($region->center,JSON_UNESCAPED_UNICODE)
                ]);
            }
        }
    }
}
