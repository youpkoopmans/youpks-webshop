<?php

namespace App\Repositories;

use App\Interfaces\FileRepositoryInterface;
use App\Models\File;

class FileRepository extends BaseRepository implements FileRepositoryInterface
{
    /**
     * FileRepository constructor.
     * @param File $model
     */
    public function __construct(File $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $path
     */
    public function seed($path)
    {
        if (!$this->model->wherePath($path)->exists()) {
            parent::create([
                'path' => $path,
                'type' => 'img'
            ]);
        }
    }

}
