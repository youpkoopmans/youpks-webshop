<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait MultipleImages
{
    /**
     * @param $request
     * @param $imageName
     * @param $model
     * @param $dirName
     * @return void
     */
    public function storeImages($request, $imageName, $model, $dirName)
    {
        if(isset($request['images'])) {
            $this->syncImages($request, $imageName, $model, $dirName);
        }
    }

    /**
     * @param $request
     * @param $imageName
     * @param $modelId
     * @param $dirName
     * @return void
     */
    public function updateImages($request, $imageName, $modelId, $dirName)
    {
        if(isset($request['images'])) {
            $model = parent::findOrFail($modelId);
            foreach($model->images as $image){
                Storage::delete($image->path);
                File::destroy(['id' => $image->id]);
            }
            $this->syncImages($request, $imageName, $model, $dirName);
        }
    }

    /**
     * @param $model
     */
    public function destroyImages($model)
    {
        if(isset($model->images)){
            foreach($model->images as $image){
                Storage::delete($image->path);
                File::destroy(['id' => $image->id]);
            $images = File::all();
            $model->images()->sync($images);
            }
        }
    }

    /**
     * @param $request
     * @param $imageName
     * @param $model
     * @param $dirName
     */
    private function syncImages($request, $imageName, $model, $dirName)
    {
        $i = 1;
        $images = [];
        foreach ($request['images'] as $image) {
            $image = $image->storeAs("images/$dirName/sub-images",
                Str::slug($imageName) . '_sub-' . $i . '.' . $image->extension());
            $image = File::create(['path' => $image, 'type' => 'img']);
            $i++;
            $images [] = $image->id;
        }
        $model->images()->sync($images);
    }



}
