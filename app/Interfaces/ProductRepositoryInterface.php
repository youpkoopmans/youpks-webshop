<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $attributes
     * @param $request
     * @return mixed
     */
    public function store($attributes, $request);

    /**
     * @param $model
     * @param $attributes
     * @param $request
     * @return mixed
     */
    public function edit($model, $attributes, $request);

    /**
     * @param array|Collection|int $ids
     */
    public function destroy($ids);

    /**
     * @param $title
     * @param $brand
     * @param $category
     * @return mixed
     */
    public function seed($title, $brand, $category);
}
