<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\SectionController;
use App\Models\Country;

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

Route::get('change-lang/{lang}', [SettingController::class, 'changeLanguage'])->name('change.language');
Route::prefix('admin')->middleware(['auth', 'check-role','role-login'])->group(function () {

    Route::get('/home', function () {
        return view('admin.home.index');
    })->name('home');

    Route::get('sections/create', [SectionController::class, 'create'])->name('sections.create');
    Route::post('sections', [SectionController::class, 'store'])->name('store.section');

    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('profile', [AdminController::class, 'updateProfile'])->name('update.profile');

    Route::get('countries', [SettingController::class, 'countries'])->name('countries.index');
    Route::get('regions', [SettingController::class, 'regions'])->name('regions.index');
    Route::get('cities', [SettingController::class, 'cities'])->name('cities.index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('category/index', function () {
        return true;
    });

    Route::get('/toggle-status/{model}/{id}/{action}', [SettingController::class, 'toggleStatus'])
        ->name('admin.toggle-status');
});

Route::view('/', 'auth.login')->name('login');
Route::view('register', 'auth.register');
Route::view('forget-password', 'auth.reset-password');

Route::post('login', [AuthController::class, 'login'])->name('send.login');
Route::post('register', [AuthController::class, 'register'])->name('send.register');
Route::post('reset-password', [AuthController::class, 'forgetPassword'])->name('reset.password');

Route::get('{provider}/redirect', [AuthController::class, 'redirectToProvider'])->name('provider.redirect');
Route::get('{provider}/callback', [AuthController::class, 'handleProviderCallback'])->name('provider.callback');

Route::get('chart', function () {
    $countries = Country::whereHas('cities')
    ->withCount('cities')->get();
    $data = $countries->map(function($country){
        return [
            'country' => json_decode($country->name,true)['ar'],
            'city_count' => $country->cities_count
        ];
    });
   return response()->json($data);
})->name('chart');
Route::view('/chart/view', 'chart')->name('chart.view');

