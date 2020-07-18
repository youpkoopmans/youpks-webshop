<?php

use Illuminate\Database\Seeder;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;

class ProductsTableSeeder extends Seeder
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * ProductTableSeeder constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param BrandRepositoryInterface $brandRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->productRepository->seed(
            'Iphone 11 Pro',
            $this->brandRepository->newQuery()->whereTitle('Apple')->pluck('title'),
            $this->categoryRepository->newQuery()->whereTitle('Smartphones')->pluck('title')
        );
    }
}
