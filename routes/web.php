<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubDistrictController;
use App\Models\Social;
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

    //districts route start
    Route::resource('/news',NewsController::class);
    Route::post('/get/subcat',[NewsController::class,'getSubCat'])->name('get.subcat');
    Route::post('/get/subdist',[NewsController::class,'getSubDist'])->name('get.subdist');
    Route::get('/news-status',[NewsController::class,'status'])->name('news.status');
    Route::post('/news/remove/items',[NewsController::class,'newsRemoveItems'])
    ->name('news.remove.items');
    //districts route end

    // setting route
    // Social setting route
    Route::get('/social/setting',[SettingController::class,'socialSetting'])->name('social');
    Route::put('/social/setting/update/{id}',[SettingController::class,'socialSettingUpdate'])
    ->name('social.update');

    // Seo setting route
    Route::get('/seo/setting',[SettingController::class,'seoSetting'])->name('seo');
    Route::put('/seo/setting/update/{id}',[SettingController::class,'seoSettingUpdate'])
    ->name('seo.update');

   // Prayer time route
    Route::get('/namaz/time',[SettingController::class,'namazTime'])->name('namaz');
    Route::put('/namaz/time/update/{id}',[SettingController::class,'namazTimeUpdate'])
    ->name('namaz.update');

      // Live tv route
    Route::get('/livetv/setting',[SettingController::class,'livetvSetting'])->name('livetv');
    Route::put('/livetv/setting/update/{id}',[SettingController::class,'livetvSettingUpdate'])
      ->name('livetv.update');
    Route::post('/livetv/status',[SettingController::class,'status'])->name('livetv.status');
   

});
require __DIR__.'/auth.php';
