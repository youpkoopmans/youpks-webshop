<?php


namespace App\Repositories;

use App\Models\File;
use App\Models\Product;
use App\Traits\CommonFields;
use App\Traits\CommonQueries;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Whoops\Exception\ErrorException;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    use CommonFields, CommonQueries;

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
        $product = parent::create($attributes);
        $this->storeImages($request, $product);
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
        $this->updateImages($request, $model->id);
    }

    /**
     * @param array|Collection|int $id
     */
    public function destroy($id)
    {
        $product = parent::findOrFail($id);
        Storage::delete($product->image);
        foreach($product->images as $image){
            Storage::delete($image->path);
            File::destroy(['id' => $image->id]);
        }
        $images = File::all();
        $product->images()->sync($images);
        parent::destroy($id);
    }

    /**
     * @param $attributes
     * @return array
     */
    private function storeImage($attributes): array
    {
        if(isset($attributes['image'])){
            $image = $attributes['image']->storeAs('images/product/main-images',
                Str::slug($attributes['title']) . '.' . $attributes['image']->extension());
            $attributes = array_merge($attributes, ['image' => $image]);
        }
        return $attributes;
    }

    /**
     * @param $request
     * @param $product
     * @return void
     */
    private function storeImages($request, $product)
    {
        if(isset($request['images'])) {
            $this->syncImages($request, $product);
        }
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
            $image = $attributes['image']->storeAs('images/product/main-images',
                Str::slug($attributes['title']) . '.' . $attributes['image']->extension());
            $attributes = array_merge($attributes, ['image' => $image]);
        }
        return $attributes;
    }

    /**
     * @param $request
     * @param $id
     * @return void
     */
    private function updateImages($request, $id)
    {
        if(isset($request['images'])) {
            $product = parent::findOrFail($id);
            foreach($product->images as $image){
                Storage::delete($image->path);
                File::destroy(['id' => $image->id]);
            }
            $this->syncImages($request, $product);
        }
    }

    /**
     * @param $request
     * @param $product
     */
    private function syncImages($request, $product)
    {
        $i = 1;
        $images = [];
        foreach ($request['images'] as $image) {
            $image = $image->storeAs('images/product/sub-images',
                Str::slug($request['title']) . '_sub-' . $i . '.' . $image->extension());
            $image = File::create(['path' => $image, 'type' => 'img']);
            $i++;
            $images [] = $image->id;
        }
        $product->images()->sync($images);
    }




}
