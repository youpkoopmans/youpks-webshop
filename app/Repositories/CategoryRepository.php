<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use App\Traits\CommonFields;
use App\Traits\Scopes;
use App\Traits\StatusAlert;
use Whoops\Exception\ErrorException;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    use CommonFields,
        StatusAlert,
        Scopes;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function roots()
    {
        return $this->model->roots();
    }

    /**
     * @return mixed
     */
    public function allLeaves()
    {
        return $this->model->allLeaves();
    }

    /**
     * @param $attributes
     * @param $request
     */
    public function store($attributes, $request)
    {
        $attributes = $this->setSlug($attributes);
        $attributes = $this->setPublishedAt($attributes, $request);
        if ($request->get('root_category') != null) {
            $this->model->whereId($request->get('root_category'))
                ->first()
                ->children()
                ->create($attributes);
        } else {
            parent::create($attributes);
        }
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
        $category = parent::findOrFail($id);
        $this->destroyAlert($category->title);
        parent::destroy($id);
    }


    /**
     * @param $title
     * @param null $parent
     */
    public function seed($title, $parent = null)
    {
        if (!$this->model->whereTitle($title)->exists()) {
            $category = parent::create([
                'title' => $title,
                'slug' => \Str::slug($title),
                'published_at' => now()
            ]);
            if($parent != null){
                $category->makeChildOf($this->model->whereTitle($parent)->first());
            }
        }
    }


}
