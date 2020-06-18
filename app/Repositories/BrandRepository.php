<?php


namespace App\Repositories;

use App\Models\Brand;
use App\Traits\CommonFields;
use App\Traits\Scopes;
use App\Traits\StatusAlert;
use Whoops\Exception\ErrorException;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    use CommonFields,
        StatusAlert,
        Scopes;
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
        $this->storeAlert($request->get('title'));
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
        $this->updateAlert($request->get('title'));
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $brand = parent::findOrFail($id);
        $this->destroyAlert($brand->title);
        parent::destroy($id);
    }

}
