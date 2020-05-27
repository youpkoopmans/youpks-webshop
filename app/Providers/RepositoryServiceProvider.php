<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
    }

    private function registerProductRepository()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    private function registerBrandRepository()
    {
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
    }


}
