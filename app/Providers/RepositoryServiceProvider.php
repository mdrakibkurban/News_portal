<?php

namespace App\Providers;

use App\Interfaces\ICategoryRepository;
use App\Interfaces\ISubCategoryRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SubCategoryRepository;
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
