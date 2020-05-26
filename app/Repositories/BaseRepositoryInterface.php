<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function createEmptyModel(): Model;


    /**
     * Returns al the models from the databass
     * @param string[] $columns
     * @return Collection
     */
    public function all($columns = ['*']): Collection;

    /**
     * Find a model by its primary key.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function find($id, $columns = ['*']): ?Model;

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail($id, $columns = ['*']): Model;

    /**
     * Find a model by given attribute value.
     *
     * @param  mixed  $attribute
     * @param  mixed  $value
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findBy($attribute, $value = null, $columns = ['*']): ?Model;

    /**
     * Find a model by given attribute value.
     *
     * @param  mixed  $attribute
     * @param  mixed  $value
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findByOrFail($attribute, $value = null, $columns = ['*']): Model;

    /**
     * Get all of the models from the database by given attribute value.
     *
     * @param  mixed  $attribute
     * @param  mixed  $value
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAllBy($attribute, $value, $columns = ['*']): Collection;

    /**
     * Get all models that have the given relation from the database.
     *
     * @param  string  $relation
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function has($relation, $columns = ['*']);

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes
     * @return Model
     */
    public function create(array $attributes = []): Model;

    /**
     * Update the model in the database.
     *
     * @param  Model  $model
     * @param  array  $attributes
     * @param  array  $options
     * @return Model
     */
    public function update(Model $model, array $attributes = [], array $options = []): Model;

    /**
     * Destroy the models for the given IDs.
     *
     * @param  \Illuminate\Support\Collection|array|int  $ids
     * @return void
     */
    public function destroy($ids);

    /**
     * Force delete the models for the given IDs.
     *
     * @param  \Illuminate\Support\Collection|array|int  $ids
     * @return void
     */
    public function forceDelete($ids);
}
