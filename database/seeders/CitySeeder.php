<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = storage_path('json/cities.json');
        if(file_exists($jsonFile)){
            $cities = json_decode(file_get_contents($jsonFile));
            foreach($cities as $city)
            {
                DB::table('cities')->insert([
                    'region_id' => $city->region_id,
                    'country_id' => $city->country_id,
                    'name' => json_encode([
                        'ar' => $city->name_ar,
                        'en' =>$city->name_en,
                    ],JSON_UNESCAPED_UNICODE),
                    'center' => json_encode($city->center,JSON_UNESCAPED_UNICODE)
                ]);
            }
        }
    }
}
