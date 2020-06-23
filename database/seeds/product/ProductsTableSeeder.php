<?php

use Illuminate\Database\Seeder;
use App\Interfaces\ProductRepositoryInterface;

class ProductsTableSeeder extends Seeder
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductTableSeeder constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->productRepository->seed('Iphone 11 Pro', 'Apple', 'Smartphones');
    }
}
