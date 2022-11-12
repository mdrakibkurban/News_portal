<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\LiveTv;
use App\Models\Namaz;
use App\Models\Seo;
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
            View::share('categories', Category::latest()->active()->take(8)->get());
            View::share('subcategories', SubCategory::latest()->active()->get());
        });

        Paginator::useBootstrap();
    }
}
