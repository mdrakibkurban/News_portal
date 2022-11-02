<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
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

     //category route start
     Route::resource('/categories',CategoryController::class);
     Route::post('/category/remove/items',[CategoryController::class,'CategoryRemoveItems'])
     ->name('category.remove.items');
     Route::get('/category-status',[CategoryController::class,'categoryStatus'])
     ->name('category.status');
     //category route end

     //sub-category route start
      Route::resource('/sub-categories',SubCategoryController::class);
      Route::get('/sub-category-status',[SubCategoryController::class,'subCategoryStatus'])
      ->name('sub-category.status');
      Route::post('/sub-category/remove/items',[SubCategoryController::class,'subCategoryRemoveItems'])
     ->name('sub-category.remove.items');
     //sub-category route end
   

});
require __DIR__.'/auth.php';
