<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubDistrictController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function(){
     Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

     //category route start
     Route::resource('/categories',CategoryController::class);
     Route::post('/category/remove/items',[CategoryController::class,'CategoryRemoveItems'])
     ->name('category.remove.items');
     Route::get('/category-status',[CategoryController::class,'status'])
     ->name('category.status');
     //category route end

     //sub-category route start
      Route::resource('/sub-categories',SubCategoryController::class);
      Route::get('/sub-category-status',[SubCategoryController::class,'status'])
      ->name('sub-category.status');
      Route::post('/sub-category/remove/items',[SubCategoryController::class,'subCategoryRemoveItems'])
     ->name('sub-category.remove.items');
     //sub-category route end


     //districts route start
     Route::resource('/districts',DistrictController::class);
     Route::post('/district/remove/items',[DistrictController::class,'districtRemoveItems'])
     ->name('district.remove.items');
    //districts route end

     //districts route start
     Route::resource('/sub-districts',SubDistrictController::class);
     Route::post('/sub-district/remove/items',[SubDistrictController::class,'SubdistrictRemoveItems'])
     ->name('sub-district.remove.items');
    //districts route end
   

});
require __DIR__.'/auth.php';
