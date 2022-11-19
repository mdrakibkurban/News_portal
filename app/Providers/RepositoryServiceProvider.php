<?php

namespace App\Providers;

use App\Interfaces\ICategoryRepository;
use App\Interfaces\IDistrictRepository;
use App\Interfaces\IDivisionRepository;
use App\Interfaces\INewsRepository;
use App\Interfaces\INoticeRepository;
use App\Interfaces\IPhotoGalleryRepository;
use App\Interfaces\ISubCategoryRepository;
use App\Interfaces\ISubDistrictRepository;
use App\Interfaces\IVedioGalleryRepository;
use App\Interfaces\IWebsiteLinkRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\DistrictRepository;
use App\Repositories\DivisionRepository;
use App\Repositories\NewsRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\PhotoGalleryRepository;
use App\Repositories\SubCategoryRepository;
use App\Repositories\SubDistrictRepository;
use App\Repositories\VedioGalleryRepository;
use App\Repositories\WebsiteLinkRepository;
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
        $this->app->bind(IDivisionRepository::class, DivisionRepository::class);
        $this->app->bind(IDistrictRepository::class, DistrictRepository::class);
        $this->app->bind(INewsRepository::class, NewsRepository::class);
        $this->app->bind(INoticeRepository::class, NoticeRepository::class);
        $this->app->bind(IWebsiteLinkRepository::class, WebsiteLinkRepository::class);
        $this->app->bind(IPhotoGalleryRepository::class, PhotoGalleryRepository::class);
        $this->app->bind(IVedioGalleryRepository::class, VedioGalleryRepository::class);
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
