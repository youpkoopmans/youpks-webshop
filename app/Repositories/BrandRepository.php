<?php


namespace App\Repositories;

use App\Models\Brand;
use App\Traits\CommonFields;
use App\Traits\CommonQueries;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Whoops\Exception\ErrorException;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    use CommonFields, CommonQueries;

    /**
     * BrandRepository constructor.
     * @param Brand $model
     */
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $attributes
     * @param $request
     */
    public function store($attributes, $request)
    {
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
        $attributes = $this->setPublishedAt($attributes, $request);
        parent::update($model, $attributes);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        parent::destroy($id);
    }

}
