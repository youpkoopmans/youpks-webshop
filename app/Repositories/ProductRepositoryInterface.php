<?php


namespace App\Repositories;


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
     * @param array|\Illuminate\Support\Collection|int $ids
     */
    public function destroy($ids);

}
