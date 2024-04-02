<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanelController;




Route::get('brands', [App\Http\Controllers\BrandController::class, 'index']);
Route::get('brands/create', [App\Http\Controllers\BrandController::class, 'create']);
Route::post('brands/create', [App\Http\Controllers\BrandController::class, 'store']);
Route::get('brands/{id}/edit', [App\Http\Controllers\BrandController::class, 'edit']);
Route::put('brands/{id}/edit', [App\Http\Controllers\BrandController::class, 'update']);
Route::get('brands/{id}/delete', [App\Http\Controllers\BrandController::class, 'destroy']);

Route::get('admins', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('admins/create', [App\Http\Controllers\AdminController::class, 'create']);
Route::post('admins/create', [App\Http\Controllers\AdminController::class, 'store']);
Route::get('admins/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit']);
Route::put('admins/{id}/edit', [App\Http\Controllers\AdminController::class, 'update']);
Route::get('admins/{id}/delete', [App\Http\Controllers\AdminController::class, 'destroy']);

Route::get('product_types', [App\Http\Controllers\ProductTypeController::class, 'index']);
Route::get('product_types/create', [App\Http\Controllers\ProductTypeController::class, 'create']);
Route::post('product_types/create', [App\Http\Controllers\ProductTypeController::class, 'store']);
Route::get('product_types/{id}/edit', [App\Http\Controllers\ProductTypeController::class, 'edit']);
Route::put('product_types/{id}/update', [App\Http\Controllers\ProductTypeController::class, 'update']);
Route::get('product_types/{id}/delete', [App\Http\Controllers\ProductTypeController::class, 'destroy']);

Route::get('products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('products/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('products/create', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit']);
Route::put('products/{id}/update', [App\Http\Controllers\ProductController::class, 'update']);
Route::get('products/{id}/delete', [App\Http\Controllers\ProductController::class, 'destroy']);


Route::get('customers', [App\Http\Controllers\CustomerController::class, 'index']);
Route::get('customers/create', [App\Http\Controllers\CustomerController::class, 'create']);
Route::post('customers/create', [App\Http\Controllers\CustomerController::class, 'store']);
Route::get('customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit']);
Route::put('customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'update']);
Route::get('customers/{id}/delete', [App\Http\Controllers\CustomerController::class, 'destroy']);


Route::get('/admin_manage-panel', [AdminPanelController::class, 'index'])->name('admin_manage-panel');


Route::get('/', function () {
    return view('customer.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('dashboard', [App\Http\Controllers\AdminPanelController::class, 'index']);
