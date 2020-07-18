<?php

use Illuminate\Database\Seeder;
use App\Interfaces\UserRepositoryInterface;

class UsersTableSeeder extends Seeder
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserTableSeeder constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userRepository->seed(
            'Youp Koopmans',
            'info@youpks.nl',
            '$2y$12$44MPz03iII3uFnPvxcvgH.GjzCy3iL1g2PTe6nRridFnm7h43bncO',
            false
        );
        $this->userRepository->seed(
            'User',
            'user@webshop.nl',
            'user1234'
        );
    }
}
