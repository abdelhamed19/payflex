<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\SectionController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::get('change-lang/{lang}', [SettingController::class, 'changeLanguage'])->name('change.language');

    Route::get('countries', [SettingController::class, 'countries'])->name('countries.index');
    Route::get('regions', [SettingController::class, 'regions'])->name('regions.index');
    Route::get('cities', [SettingController::class, 'cities'])->name('cities.index');

    Route::get('/admin/toggle-status/{model}/{id}/{action}', [SettingController::class, 'toggleStatus'])
        ->name('admin.toggle-status');
});
Route::get('sections/create', [SectionController::class, 'create'])->name('sections.create');
Route::post('sections', [SectionController::class, 'store'])->name('store.section');

Route::view('login','auth.login')->name('login');
Route::view('register','auth.register');
Route::view('reset-password','auth.reset-password');

Route::post('login',[AuthController::class,'login'])->name('send.login');
Route::post('register',[AuthController::class,'register'])->name('send.register');
Route::post('reset-password',[AuthController::class,'resetPassword'])->name('send.reset.password');
