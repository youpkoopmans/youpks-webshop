<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\BrandRepository;
use App\Repositories\BrandRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->registerProductRepository();
        $this->registerBrandRepository();
        $this->registerCategoryRepository();
    }

    private function registerProductRepository()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    private function registerBrandRepository()
    {
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
    }

    private function registerCategoryRepository()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }


}
