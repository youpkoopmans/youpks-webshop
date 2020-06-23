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
        $this->categoryRepository->seed('Computers');
            $this->categoryRepository->seed('Laptops', 'Computers');
                $this->categoryRepository->seed('Gaming laptops', 'Laptops');
                $this->categoryRepository->seed('Zakelijke laptops', 'Laptops');
            $this->categoryRepository->seed('Desktops', 'Computers');
                $this->categoryRepository->seed('Gaming desktops', 'Desktops');
                $this->categoryRepository->seed('Zakelijke desktops', 'Desktops');
            $this->categoryRepository->seed('Monitors', 'Computers');
                $this->categoryRepository->seed('Gaming monitors', 'Monitors');
                $this->categoryRepository->seed('Zakelijke monitors', 'Monitors');

        $this->categoryRepository->seed('Telefoons');
            $this->categoryRepository->seed('Mobiele telefoons', 'Telefoons');
                $this->categoryRepository->seed('Smartphones', 'Mobiele telefoons');
                $this->categoryRepository->seed('Gsm\'s', 'Mobiele telefoons');
            $this->categoryRepository->seed('Vaste telefoons', 'Telefoons');
                $this->categoryRepository->seed('DECT telefoons', 'Vaste telefoons');
                $this->categoryRepository->seed('Handsets', 'Vaste telefoons');

        $this->categoryRepository->seed('Beeld & geluid');
            $this->categoryRepository->seed('Televisies & beamers', 'Beeld & geluid');
                $this->categoryRepository->seed('Televisies', 'Televisies & beamers');
                $this->categoryRepository->seed('Beamers', 'Televisies & beamers');
            $this->categoryRepository->seed('Radio\'s & speakers', 'Beeld & geluid');
                $this->categoryRepository->seed('Radio\'s', 'Radio\'s & speakers');
                $this->categoryRepository->seed('Speakers', 'Radio\'s & speakers');
    }
}
