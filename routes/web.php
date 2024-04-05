<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\CustomerLoginChecking;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
//ADMIN
Route::get('brands', [App\Http\Controllers\BrandController::class, 'index'])->middleware('Logged');
Route::get('brands/create', [App\Http\Controllers\BrandController::class, 'create'])->middleware('Logged');
Route::post('brands/create', [App\Http\Controllers\BrandController::class, 'store'])->middleware('Logged');
Route::get('brands/{id}/edit', [App\Http\Controllers\BrandController::class, 'edit'])->middleware('Logged');
Route::put('brands/{id}/edit', [App\Http\Controllers\BrandController::class, 'update'])->middleware('Logged');
Route::get('brands/{id}/delete', [App\Http\Controllers\BrandController::class, 'destroy'])->middleware('Logged');

Route::get('admins', [App\Http\Controllers\AdminController::class, 'index'])->middleware('Logged');
Route::get('admins/create', [App\Http\Controllers\AdminController::class, 'create'])->middleware('Logged');
Route::post('admins/create', [App\Http\Controllers\AdminController::class, 'store'])->middleware('Logged');
Route::get('admins/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->middleware('Logged');
Route::put('admins/{id}/edit', [App\Http\Controllers\AdminController::class, 'update'])->middleware('Logged');
Route::get('admins/{id}/delete', [App\Http\Controllers\AdminController::class, 'destroy'])->middleware('Logged');

Route::get('product_types', [App\Http\Controllers\ProductTypeController::class, 'index'])->middleware('Logged');
Route::get('product_types/create', [App\Http\Controllers\ProductTypeController::class, 'create'])->middleware('Logged');
Route::post('product_types/create', [App\Http\Controllers\ProductTypeController::class, 'store'])->middleware('Logged');
Route::get('product_types/{id}/edit', [App\Http\Controllers\ProductTypeController::class, 'edit'])->middleware('Logged');
Route::put('product_types/{id}/update', [App\Http\Controllers\ProductTypeController::class, 'update'])->middleware('Logged');
Route::get('product_types/{id}/delete', [App\Http\Controllers\ProductTypeController::class, 'destroy'])->middleware('Logged');

Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->middleware('Logged');
Route::get('products/create', [App\Http\Controllers\ProductController::class, 'create'])->middleware('Logged');
Route::post('products/create', [App\Http\Controllers\ProductController::class, 'store'])->middleware('Logged');
Route::get('products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->middleware('Logged');
Route::put('products/{id}/update', [App\Http\Controllers\ProductController::class, 'update'])->middleware('Logged');
Route::get('products/{id}/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->middleware('Logged');


Route::get('customers', [App\Http\Controllers\CustomerController::class, 'index'])->middleware('Logged');
Route::get('customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->middleware('Logged');
Route::post('customers/create', [App\Http\Controllers\CustomerController::class, 'store'])->middleware('Logged');
Route::get('customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->middleware('Logged');
Route::put('customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'update'])->middleware('Logged');
Route::get('customers/{id}/delete', [App\Http\Controllers\CustomerController::class, 'destroy'])->middleware('Logged');


Route::get('/dashboard', [App\Http\Controllers\AdminPanelController::class, 'index'])->middleware('Logged');
Route::get('/adminlogin', [App\Http\Controllers\AdminAuthController::class,'adminlogin']);
Route::post('/adminlogin_process', [App\Http\Controllers\AdminAuthController::class,'loginprocess'])->name('loginprocess');
Route::get('/logout', [App\Http\Controllers\AdminAuthController::class,'logout']);



//CUSTOMER
Route::get('/', function () {
    return view('customers.index');
})->name('home');

Route::get('/index', function () {
    return view('customers.index');
})->name('index_page');




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
