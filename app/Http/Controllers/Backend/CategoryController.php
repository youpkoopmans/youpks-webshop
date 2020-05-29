<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use App\Validation\CategoryRules;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the category.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = $this->categoryRepository->roots()->get();

        return view('b:category::index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     */
    public function create()
    {
        $categories = $this->categoryRepository->roots()->pluck('title', 'id');
        return view('b:category::form.create', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, CategoryRules::store());
        $this->categoryRepository->store($validator, $request);

        return redirect()->route('backend.category.index');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        $categories = $this->categoryRepository->roots()->pluck('title', 'id');
        $category = $this->categoryRepository->findOrFail($category->id);

        $data = [
            'categories' => $categories,
            'category' => $category,
        ];

        return view('b:category::form.edit', $data);
    }

    /**
     * Update the specified category in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Category $category)
    {
        $validator = $this->validate($request, CategoryRules::store());
        $this->categoryRepository->edit($category, $validator, $request);

        return redirect()->route('backend.category.index');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->destroy($category->id);

        return redirect()->route('backend.category.index');
    }

}
