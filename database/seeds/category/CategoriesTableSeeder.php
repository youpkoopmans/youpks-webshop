<?php

use Illuminate\Database\Seeder;
use App\Interfaces\CategoryRepositoryInterface;

class CategoriesTableSeeder extends Seeder
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryTableSeeder constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->categoryRepository->seed(
            'Computers'
        );
            $this->categoryRepository->seed(
                'Laptops',
                $this->categoryRepository->newQuery()->whereTitle('Computers')->pluck('title')
            );
                $this->categoryRepository->seed(
                    'Gaming laptops',
                    $this->categoryRepository->newQuery()->whereTitle('Laptops')->pluck('title')
                );
                $this->categoryRepository->seed(
                    'Zakelijke laptops',
                    $this->categoryRepository->newQuery()->whereTitle('Laptops')->pluck('title')
                );
            $this->categoryRepository->seed(
                'Desktops',
                $this->categoryRepository->newQuery()->whereTitle('Computers')->pluck('title')
            );
                $this->categoryRepository->seed(
                    'Gaming desktops',
                    $this->categoryRepository->newQuery()->whereTitle('Desktops')->pluck('title')
                );
                $this->categoryRepository->seed(
                    'Zakelijke desktops',
                    $this->categoryRepository->newQuery()->whereTitle('Desktops')->pluck('title')
                );
            $this->categoryRepository->seed(
                'Monitors',
                $this->categoryRepository->newQuery()->whereTitle('Computers')->pluck('title')
            );
                $this->categoryRepository->seed(
                    'Gaming monitors',
                    $this->categoryRepository->newQuery()->whereTitle('Monitors')->pluck('title')
                );
                $this->categoryRepository->seed(
                    'Zakelijke monitors',
                    $this->categoryRepository->newQuery()->whereTitle('Monitors')->pluck('title')
                );

        $this->categoryRepository->seed(
            'Telefoons'
        );
            $this->categoryRepository->seed(
                'Mobiele telefoons',
                $this->categoryRepository->newQuery()->whereTitle('Telefoons')->pluck('title')
            );
                $this->categoryRepository->seed(
                    'Smartphones',
                    $this->categoryRepository->newQuery()->whereTitle('Mobiele telefoons')->pluck('title')
                );
                $this->categoryRepository->seed(
                    'Gsm\'s',
                    $this->categoryRepository->newQuery()->whereTitle('Mobiele telefoons')->pluck('title')
                );
            $this->categoryRepository->seed(
                'Vaste telefoons',
                $this->categoryRepository->newQuery()->whereTitle('Telefoons')->pluck('title')
            );
                $this->categoryRepository->seed(
                    'DECT telefoons',
                    $this->categoryRepository->newQuery()->whereTitle('Vaste telefoons')->pluck('title')
                );
                $this->categoryRepository->seed(
                    'Handsets',
                    $this->categoryRepository->newQuery()->whereTitle('Vaste telefoons')->pluck('title')
                );

        $this->categoryRepository->seed(
            'Beeld & geluid'
        );
            $this->categoryRepository->seed(
                'Televisies & beamers',
                $this->categoryRepository->newQuery()->whereTitle('Beeld & geluid')->pluck('title')
            );
                $this->categoryRepository->seed(
                    'Televisies',
                    $this->categoryRepository->newQuery()->whereTitle('Televisies & beamers')->pluck('title')
                );
                $this->categoryRepository->seed(
                    'Beamers',
                    $this->categoryRepository->newQuery()->whereTitle('Televisies & beamers')->pluck('title')
                );
            $this->categoryRepository->seed(
                'Radio\'s & speakers',
                $this->categoryRepository->newQuery()->whereTitle('Beeld & geluid')->pluck('title')
            );
                $this->categoryRepository->seed(
                    'Radio\'s',
                    $this->categoryRepository->newQuery()->whereTitle('Radio\'s & speakers')->pluck('title')
                );
                $this->categoryRepository->seed(
                    'Speakers',
                    $this->categoryRepository->newQuery()->whereTitle('Radio\'s & speakers')->pluck('title')
                );
    }
}
