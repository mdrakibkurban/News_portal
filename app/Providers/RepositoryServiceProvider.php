<?php

namespace App\Providers;

use App\Interfaces\ICategoryRepository;
use App\Interfaces\IDistrictRepository;
use App\Interfaces\ISubCategoryRepository;
use App\Interfaces\ISubDistrictRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\DistrictRepository;
use App\Repositories\SubCategoryRepository;
use App\Repositories\SubDistrictRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(ISubCategoryRepository::class, SubCategoryRepository::class);
        $this->app->bind(IDistrictRepository::class, DistrictRepository::class);
        $this->app->bind(ISubDistrictRepository::class, SubDistrictRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
