<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use App\Validation\ProductRules;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProductController
{
    use ValidatesRequests;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the product.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = $this->productRepository->all();

        return view('backend.pages.product.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     */
    public function create()
    {
        return view('backend.pages.product.form.create');
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

        return view('backend.pages.product.form.edit')->with(compact('product'));
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
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function destroy(Request $request)
    {
        $validator = $this->validate($request, ProductRules::destroy());
        $this->productRepository->destroy($validator);

        return redirect()->route('backend.product.index');
    }

}
