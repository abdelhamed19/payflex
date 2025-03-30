<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jsonFile = storage_path('json/countries.json');
        if (file_exists($jsonFile))
        {
            $countries = json_decode(file_get_contents($jsonFile));

            foreach ($countries as $country) {
                DB::table('countries')->insert([
                    'name' => json_encode([
                        'en' => $country->name,
                        'ar' => $country->native,
                    ], JSON_UNESCAPED_UNICODE) ?? null,
                    'iso3' => $country->iso3 ?? null,
                    'iso2' => $country->iso2 ?? null,
                    'numeric_code' => $country->numeric_code ?? null,
                    'phone_code' => $country->phone_code ?? null,
                    'capital' => $country->capital ?? null,
                    'currency' => $country->currency ?? null,
                    'currency_symbol' => $country->currency_symbol ?? null,
                    'tld' => $country->tld ?? null,
                    'native' => $country->native ?? null,
                    'region' => $country->region ?? null,
                    'subregion' => $country->subregion ?? null,
                    'timezones' => json_encode($country->timezones,JSON_UNESCAPED_UNICODE) ?? null,
                    'translations' => json_encode($country->translations,JSON_UNESCAPED_UNICODE) ?? null,
                    'languages' => json_encode($country->languages ?? null,JSON_UNESCAPED_UNICODE) ?? null,
                    'latitude' => $country->latitude ?? null,
                    'longitude' => $country->longitude ?? null,
                    'emoji' => $country->emoji ?? null,
                    'emojiU' => $country->emojiU ?? null,
                ]);
            }
        }
    }
}
