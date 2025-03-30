<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('change-lang/{lang}',function($lang){
        session(['lang' => $lang]);
    return back();
})->name('change.language');

Route::get('countries',function(){
    $countries = \App\Models\Country::paginate(10);
    return view('admin.countries.index',compact('countries'));
})->name('countries.index');
