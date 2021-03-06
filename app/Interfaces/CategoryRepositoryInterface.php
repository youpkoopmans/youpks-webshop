<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @return mixed
     */
    public function roots();

    /**
     * @return mixed
     */
    public function allLeaves();


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
     * @param null $parent
     * @return mixed
     */
    public function seed($title, $parent = null);
}
