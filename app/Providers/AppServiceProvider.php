<?php

namespace App\Providers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\LiveTv;
use App\Models\Namaz;
use App\Models\News;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\Social;
use App\Models\SubCategory;
use App\Models\WebsiteLink;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            View::share('seo', Seo::first());
            View::share('social', Social::first());
            View::share('websitelinks', WebsiteLink::latest()->get());
            View::share('livetv', LiveTv::first());
            View::share('namaz', Namaz::first());
            View::share('categories', Category::latest()->active()->take(10)->get());
            View::share('subcategories', SubCategory::latest()->active()->get());
            View::share('headlines', News::latest()->where('headline', 1)->get());
            View::share('latest', News::latest()->active()->take(7)->get());
            View::share('favourite', News::inRandomOrder()->active()->limit(7)->get());
            View::share('special', News::latest()->active()->take(7)->get()); 
            View::share('special', News::latest()->active()->take(7)->get()); 
            View::share('special', News::latest()->active()->take(7)->get()); 
            View::share('vartical1', Ads::where('type',1)->first()); 
            View::share('vartical2', Ads::where('type',1)->skip(1)->first()); 
            View::share('website', Setting::first()); 
        });

        Paginator::useBootstrap();
    }
}
