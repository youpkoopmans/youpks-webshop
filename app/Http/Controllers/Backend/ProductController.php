<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\BrandRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Validation\ProductRules;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param BrandRepositoryInterface $brandRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the product.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = $this->productRepository->all();
        $data = [
            'products' => $products
        ];
        return view('backend.pages.product.index', $data);
    }

    /**
     * Show the form for creating a new product.
     *
     */
    public function create()
    {
        $brands = $this->brandRepository->whereNotNull('published_at')
            ->orderBy('title', 'ASC')
            ->pluck('title', 'id');
        $categories = $this->categoryRepository->allLeaves()
            ->whereNotNull('published_at')
            ->orderBy('title', 'ASC')
            ->pluck('title', 'id');
        $data = [
          'brands' => $brands,
          'categories' => $categories
        ];
        return view('backend.pages.product.form.create', $data);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, ProductRules::store());
        $this->productRepository->store($validator, $request);

        return redirect()->route('backend.product.index');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        $product = $this->productRepository->findOrFail($product->id);
        $brands = $this->brandRepository->whereNotNull('published_at')
            ->orderBy('title', 'ASC')
            ->pluck('title', 'id');
        $categories = $this->categoryRepository->allLeaves()
            ->whereNotNull('published_at')
            ->orderBy('title', 'ASC')
            ->pluck('title', 'id');
        $data = [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
        ];
        return view('backend.pages.product.form.edit', $data);
    }

    /**
     * Update the specified product in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Product $product)
    {
        $validator = $this->validate($request, ProductRules::store());
        $this->productRepository->edit($product, $validator, $request);

        return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $this->productRepository->destroy($product->id);

        return redirect()->route('backend.product.index');
    }

}
