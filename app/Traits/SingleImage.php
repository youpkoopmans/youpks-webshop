<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait SingleImage
{
    /**
     * @param $attributes
     * @param $imageName
     * @param $dirName
     * @return array
     */
    public function storeImage($attributes, $imageName, $dirName): array
    {
        if(isset($attributes['image'])){
            $image = $attributes['image']->storeAs("images/$dirName/main-images",
                Str::slug($imageName) . '.' . $attributes['image']->extension());
            $attributes = array_merge($attributes, ['image' => $image]);
        }
        return $attributes;
    }

    /**
     * @param $attributes
     * @param $imageName
     * @param $modelId
     * @param $dirName
     * @return array
     */
    public function updateImage($attributes, $imageName, $modelId, $dirName): array
    {
        if(isset($attributes['image'])){
            $model = parent::findOrFail($modelId);
            Storage::delete($model->image);
            $image = $attributes['image']->storeAs("images/$dirName/main-images",
                Str::slug($imageName) . '.' . $attributes['image']->extension());
            $attributes = array_merge($attributes, ['image' => $image]);
        }
        return $attributes;
    }

    /**
     * @param $model
     */
    public function destroyImage($model)
    {
        Storage::delete($model->image);
    }

}
