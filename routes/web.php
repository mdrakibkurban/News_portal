<?php

use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DivistionController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\VedioGalleryController;
use App\Http\Controllers\Admin\WebsiteLinkController;
use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LanguageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'index']);



Route::prefix('news')->name('news.')->group(function(){
  Route::get('/{category_en?}', [HomeController::class,'allNewsCategory'])->name('category');
  Route::get('/{category_en?}/{subcategory_en?}', [HomeController::class,'allNewsSubCategory'])
  ->name('subcategory');
  Route::get('/{category_en?}/{subcategory_en?}/{id?}', [HomeController::class,'singleNews'])->name('news');
});

Route::post('frontend/get/district',[HomeController::class,'getDistrict'])->name('frontend.get.district');

Route::post('frontend/news/saradesh',[HomeController::class,'saradesh'])->name('news.saradesh');




Route::get('/lang/english', [LanguageController::class,'English'])->name('lang.english');  
Route::get('/lang/bangla', [LanguageController::class,'Bangla'])->name('lang.bangla');


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


     //division route start
     Route::resource('/divisions',DivistionController::class);
     Route::post('/division/remove/items',[DivistionController::class,'divisionRemoveItems'])
     ->name('division.remove.items');
    //division route end

     //districts route start
     Route::resource('/districts',DistrictController::class);
     Route::post('/district/remove/items',[DistrictController::class,'districtRemoveItems'])
     ->name('district.remove.items');
    //districts route end

    //news route start
    Route::resource('/news',NewsController::class);
    Route::post('/get/subcat',[NewsController::class,'getSubCat'])->name('get.subcat');
    Route::post('/get/district',[NewsController::class,'getDistrict'])->name('get.district');
    Route::get('/news-status',[NewsController::class,'status'])->name('news.status');
    Route::post('/news/remove/items',[NewsController::class,'newsRemoveItems'])
    ->name('news.remove.items');
    //news route end

    // setting route

    // Prayer time route
    Route::get('/setting',[SettingController::class,'setting'])->name('setting');
    Route::put('/setting/update/{id}',[SettingController::class,'settingUpdate'])
    ->name('setting.update');

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


    // notice route
    Route::resource('/notices',NoticeController::class);
    Route::post('/notice/remove/items',[NoticeController::class,'noticeRemoveItems'])
    ->name('notice.remove.items');
    Route::get('/notice-status',[NoticeController::class,'status'])
    ->name('notice.status');

    // WebsiteLink route
    Route::resource('/websites',WebsiteLinkController::class);
    Route::post('/website/remove/items',[WebsiteLinkController::class,'websiteRemoveItems'])
    ->name('website.remove.items');

    // PhotoGallery route
    Route::resource('/photos',PhotoGalleryController::class);
    Route::post('/photo/remove/items',[PhotoGalleryController::class,'photoRemoveItems'])
    ->name('photo.remove.items');

    // VedioGallery route
    Route::resource('/vedios',VedioGalleryController::class);
    Route::post('/vedio/remove/items',[VedioGalleryController::class,'vedioRemoveItems'])
    ->name('vedio.remove.items');

    // Ads route
    Route::resource('/ads',AdsController::class);
    Route::post('/ads/remove/items',[VedioGalleryController::class,'AdsRemoveItems'])
    ->name('ads.remove.items');

    //writer route

    Route::resource('writers',WriterController::class);

    Route::get('profile',[SettingController::class,'profile'])->name('profile');
    Route::put('profile/update',[SettingController::class,'updateProfile'])->name('profile.update');
    Route::put('/password/update',[SettingController::class,'updatePassword'])
    ->name('password.update');

});
require __DIR__.'/auth.php';
