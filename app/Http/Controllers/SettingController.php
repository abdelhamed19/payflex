<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use App\Models\Country;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function countries()
    {
        $countries = Country::paginate(10);
        return view('admin.countries.index', compact('countries'));
    }
    public function regions()
    {
        $regions = Region::with('country')->paginate(10);
        return view('admin.regions.index', compact('regions'));
    }
    public function cities()
    {
        $cities = City::with(['country','region'])->paginate(10);
        return view('admin.cities.index', compact('cities'));
    }
}
