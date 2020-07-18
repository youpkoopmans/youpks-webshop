<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Interfaces\FileRepositoryInterface;

class FileController extends Controller
{
    /**
     * @var FileRepositoryInterface
     */
    private $fileRepository;

    /**
     * FileController constructor.
     * @param FileRepositoryInterface $fileRepository
     */
    public function __construct(FileRepositoryInterface $fileRepository)
    {
        $this->fileRepository = $fileRepository;
        $this->middleware('auth');
    }




}
