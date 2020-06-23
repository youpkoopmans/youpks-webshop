<?php


namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $name
     * @param $email
     * @param $password
     * @param bool $passwordHash
     */
    public function seed($name, $email, $password, $passwordHash = true)
    {
        if (!$this->model->whereEmail($email)->exists()) {
            parent::create([
                'name' => $name,
                'email' => $email,
                'password' => $passwordHash ? \Hash::make($password) : $password,
            ]);
        }
    }

}
