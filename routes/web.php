<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\CustomerLoginChecking;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('customers.index');
})->name('home');

Route::get('/index', function () {
    return view('customers.index');
})->name('index_page');

Route::get('/product', [ProductController::class, 'index'])->name('product');

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
Route::delete('admins/{id}/delete', [App\Http\Controllers\AdminController::class, 'destroy']);

Route::get('product_types', [App\Http\Controllers\ProductTypeController::class, 'index']);
Route::get('product_types/create', [App\Http\Controllers\ProductTypeController::class, 'create']);
Route::post('product_types/create', [App\Http\Controllers\ProductTypeController::class, 'store']);
Route::get('product_types/{id}/edit', [App\Http\Controllers\ProductTypeController::class, 'edit']);
Route::put('product_types/{id}/edit', [App\Http\Controllers\ProductTypeController::class, 'update']);
Route::get('product_types/{id}/delete', [App\Http\Controllers\ProductTypeController::class, 'destroy']);

Route::get('products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('products/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('products/create', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit']);
Route::put('products/{id}/update', [App\Http\Controllers\ProductController::class, 'update']);
Route::get('products/{id}/delete', [App\Http\Controllers\ProductController::class, 'destroy']);


Route::middleware(CustomerLoginChecking::class)->group(function () {
    Route::get('/info', [CustomerController::class, 'editInfo'])->name('info');
    Route::put('/info', [CustomerController::class, 'updateInfo'])->name('info.update');

    Route::get('/change_password', [CustomerController::class, 'editPassword'])->name('password.edit');
    Route::put('/change_password', [CustomerController::class, 'updatePassword'])->name('customers.pwdUpdate');

});

Route::get('/register', [CustomerController::class, 'register'])->name('customers.register');
Route::post('/register', [CustomerController::class, 'processingRegister'])->name('customers.processingRegister');

Route::get('/login', [CustomerController::class, 'login'])->name('customers.login');
Route::post('/login', [CustomerController::class, 'loginProcess'])->name('customer.loginProcess');

Route::get('/logout', [CustomerController::class, 'logout'])->name('customers.logout');
Route::get('/password-forget', [CustomerController::class, 'forgotPassword'])->name('customers.passwordForget');

Route::get('/admin_manage-panel', [AdminPanelController::class, 'index'])->name('admin_manage-panel');
Route::get('dashboard', [App\Http\Controllers\AdminPanelController::class, 'index']);

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('chi-tiet-san-pham/{id}',[HomeController::class, 'productDetail'])->name('product_detail');

/*Route::get('chi-tiet-san-pham/{id}',[
    'as'=> 'chitietsanpham',
    'uses'=>'Homecontroller@productDetail'
]);

Route::get('chi-tiet-san-pham/{id}', 'HomeController@productDetail')->name('product_detail');*/

Route::get('Product-type/{id}',[HomeController::class, 'getType'])->name('product_type');
