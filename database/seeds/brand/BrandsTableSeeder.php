<?php

use App\Interfaces\BrandRepositoryInterface;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * BrandTableSeeder constructor.
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->brandRepository->seed(
            'Apple'
        );
        $this->brandRepository->seed(
            'Dell'
        );
        $this->brandRepository->seed(
            'Lenovo'
        );
    }
}
