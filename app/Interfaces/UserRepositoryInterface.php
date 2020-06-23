<?php

namespace App\Interfaces;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $name
     * @param $email
     * @param $password
     * @param $passwordHash
     * @return mixed
     */
    public function seed($name, $email, $password, $passwordHash = true);
}
