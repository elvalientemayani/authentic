<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
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
    return view('welcome');
});

Route::get('/admin', function(){
    return view('admin');
});

Route::get('/add-user', function(){
    return view('add_user');
});

Route::get('/admin-charts', function(){
    return view('admin-charts');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/inventory', [InventoryController::class,'inventory'])->name('inventory');
Route::get('/add',[InventoryController::class,'create'])->name('item.create');
Route::get('/item/{id}', [InventoryController::class,'itemDetails'])->name('item.details');
Route::post('/item', [InventoryController::class,'store'])->name('item.store');
Route::get('/item/{id}/edit', [InventoryController::class,'edit'])->name('item.edit');
Route::put('/item/{id}', [InventoryController::class,'update'])->name('item.update');
Route::delete('item/{id}',[InventoryController::class,'destroy'])->name('item.destroy');
