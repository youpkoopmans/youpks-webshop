<?php


namespace App\Repositories;

use App\Models\Product;
use App\Traits\CommonFields;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Whoops\Exception\ErrorException;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    use CommonFields;

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
        $attributes = $this->storeImage($attributes);
        $attributes = $this->setSlug($attributes);
        $attributes = $this->setPublishedAt($attributes, $request);
        parent::create($attributes);
    }

    /**
     * @param $model
     * @param $attributes
     * @param $request
     * @throws ErrorException
     */
    public function edit($model, $attributes, $request)
    {
        $attributes = $this->updateImage($attributes, $model->id);
        $attributes = $this->setPublishedAt($attributes, $request);
        parent::update($model, $attributes);
    }

    /**
     * @param array|Collection|int $ids
     */
    public function destroy($ids)
    {
        $products = parent::findMany($ids);
        $products->each(function ($product) {
            Storage::delete($product->image);
        });
        parent::destroy($ids);
    }

    /**
     * @param $attributes
     * @return array
     */
    private function storeImage($attributes): array
    {
        if(isset($attributes['image'])){
            $image = $attributes['image']->store('images');
            $attributes = array_merge($attributes, ['image' => $image]);
        }
        return $attributes;
    }

    /**
     * @param $attributes
     * @param $id
     * @return array
     */
    private function updateImage($attributes, $id): array
    {
        if(isset($attributes['image'])){
            $product = parent::findOrFail($id);
            Storage::delete($product->image);
            $image = $attributes['image']->store('images');
            $attributes = array_merge($attributes, ['image' => $image]);
        }
        return $attributes;
    }

}
