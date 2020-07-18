<?php

namespace App\Interfaces;

interface FileRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $path
     * @return mixed
     */
    public function seed($path);
}
