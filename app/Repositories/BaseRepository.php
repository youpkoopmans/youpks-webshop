<?php


namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as BaseCollection;
use Whoops\Exception\ErrorException;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /** @var Model */
    protected $model;

    /**
     * @param  Model  $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function newQuery(): Builder
    {
        return $this->createEmptyModel()->newQuery();
    }

    public function createEmptyModel(): Model
    {
        return new $this->model;
    }

    public function create(array $attributes = []): Model
    {
        return $this->newQuery()->create($attributes);
    }

    public function all($columns = ['*']): Collection
    {
        return $this->newQuery()->get(is_array($columns) ? $columns : func_get_args());
    }

    public function find($id, $columns = ['*']): ?Model
    {
        return $this->newQuery()->find($id, $columns);
    }

    public function findMany($ids): Collection
    {
        return $this->newQuery()->findMany($ids);
    }

    public function findOrFail($id, $columns = ['*']): Model
    {
        return $this->newQuery()->findOrFail($id, $columns);
    }

    public function findBy($attribute, $value = null, $columns = ['*']): ?Model
    {
        return $this->newQuery()->where($attribute, $value)->first($columns);
    }

    public function findByOrFail($attribute, $value = null, $columns = ['*']): Model
    {
        return $this->newQuery()->where($attribute, $value)->firstOrFail($columns);
    }

    public function findAllBy($attribute, $value, $columns = ['*']): Collection
    {
        return $this->newQuery()->where($attribute, $value)->get($columns);
    }

    public function has($relation, $columns = ['*']): Collection
    {
        return $this->newQuery()->has($relation)->get($columns);
    }

    public function update(Model $model, array $attributes = [], array $options = []): Model
    {
        if (!$model instanceof $this->model) {
            throw new InvalidArgumentException('$model must be instance of '.get_class($this->model));
        }

        if (!$model->update($attributes, $options)) {
            $message = 'Update failed.';
            if (!$model->exists) {
                $message .= sprintf(' Model %s does not exist.', get_class($model));
            }
            throw new ErrorException($message);
        }

        return $model;
    }

    public function destroy($ids)
    {
        $this->model::destroy($ids);
    }

    public function forceDelete($ids)
    {
        if ($ids instanceof BaseCollection) {
            $ids = $ids->all();
        }
        $ids = is_array($ids) ? $ids : func_get_args();

        foreach ($this->newQuery()->whereIn($this->model->getKeyName(), $ids)->get() as $model) {
            $model->forceDelete();
        }

    }
}
