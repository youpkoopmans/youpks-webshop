<?php


namespace App\Repositories;


use Illuminate\Support\Collection;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * @param $attributes
     * @param $request
     * @param $alertText
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

}
