<?php

use App\Http\Controllers\Admin\OrderController;

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('index');
});
Route::get('change-lang/{lang}',function($lang){
        session(['lang' => $lang]);
    return back();
})->name('change.language');

Route::get('countries',[SettingController::class,'countries'])->name('countries.index');
Route::get('regions',[SettingController::class,'regions'])->name('regions.index');
Route::get('cities',[SettingController::class,'cities'])->name('cities.index');
Route::get('sections/create',[SectionController::class,'create'])->name('sections.create');
Route::post('sections',[SectionController::class,'store'])->name('store.section');


Route::get('temp/create',function(){
    return view('templates.section.create');
});


// Routes for orders
Route::get('orders/index', [OrderController::class, 'index'])->name('orders.index');
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('orders/{id}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
