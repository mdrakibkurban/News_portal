<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function(){
     Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
     Route::resource('/categories',CategoryController::class);
     Route::post('/multiple-delete-category',[CategoryController::class,'multipleDeleteCategory'])
     ->name('category.multiple-delete');
     Route::get('/category-status',[CategoryController::class,'categoryStatus'])->name('category.status');
});
require __DIR__.'/auth.php';
