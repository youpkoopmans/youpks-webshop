<?php

namespace App\Controllers\Backend;

use App\Controllers\Controller;
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
