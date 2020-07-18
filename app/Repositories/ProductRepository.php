<?php


namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\CommonFields;
use App\Traits\MultipleImages;
use App\Traits\Scopes;
use App\Traits\SingleImage;
use App\Traits\StatusAlert;
use Illuminate\Support\Collection;
use Whoops\Exception\ErrorException;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    use CommonFields,
        SingleImage,
        MultipleImages,
        StatusAlert,
        Scopes;
    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $attributes
     * @param $request
     */
    public function store($attributes, $request)
    {
        $attributes = $this->storeImage($attributes, $attributes['title'], 'product');
        $attributes = $this->setSlug($attributes);
        $attributes = $this->setPublishedAt($attributes, $request);
        $product = parent::create($attributes);
        $this->storeImages($request, $request->get('title'), $product, 'product');
        $this->storeAlert($request->get('title'));
    }

    /**
     * @param $product
     * @param $attributes
     * @param $request
     * @throws ErrorException
     */
    public function edit($product, $attributes, $request)
    {
        $attributes = $this->updateImage($attributes, $attributes['title'], $product->id, 'product');
        $attributes = $this->setPublishedAt($attributes, $request);
        parent::update($product, $attributes);
        $this->updateImages($request, $request->get('title'), $product->id, 'product');
        $this->updateAlert($request->get('title'));
    }

    /**
     * @param array|Collection|int $id
     */
    public function destroy($id)
    {
        $product = parent::findOrFail($id);
        $this->destroyImages($product);
        $this->destroyImage($product);
        $this->destroyAlert($product->title);
        parent::destroy($id);
    }

    /**
     * @param $title
     * @param $brand
     * @param $category
     */
    public function seed($title, $brand, $category)
    {
        if (!$this->model->whereTitle($title)->exists()) {
            parent::create([
                'title' => $title,
                'brand_id' => Brand::whereTitle($brand)->pluck('id')->first(),
                'category_id' => Category::whereTitle($category)->pluck('id')->first(),
                'slug' => \Str::slug($title),
                'intro' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'price' => 1150.00,
                'image' => 'images/product/main-images/'.$title.'.jpg',
                'published_at' => now()
            ]);
        }
    }

}
