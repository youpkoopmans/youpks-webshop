<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Repositories\BrandRepositoryInterface;
use App\Validation\BrandRules;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * BrandController constructor.
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the brand.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $brands = $this->brandRepository->all();

        return view('backend.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new brand.
     *
     */
    public function create()
    {
        return view('backend.pages.brand.form.create');
    }

    /**
     * Store a newly created brand in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, BrandRules::store());
        $this->brandRepository->store($validator, $request);

        return redirect()->route('backend.brand.index');
    }

    /**
     * Show the form for editing the specified brand.
     *
     * @param Brand $brand
     * @return Application|Factory|View
     */
    public function edit(Brand $brand)
    {
        $brand = $this->brandRepository->findOrFail($brand->id);

        return view('backend.pages.brand.form.edit', compact('brand'));
    }

    /**
     * Update the specified brand in storage.
     *
     * @param Request $request
     * @param Brand $brand
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Brand $brand)
    {
        $validator = $this->validate($request, BrandRules::store());
        $this->brandRepository->edit($brand, $validator, $request);

        return redirect()->route('backend.brand.index');
    }

    /**
     * Remove the specified brand from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function destroy(Request $request)
    {
        $validator = $this->validate($request, BrandRules::destroy());
        $this->brandRepository->destroy($validator);

        return redirect()->route('backend.brand.index');
    }

}
