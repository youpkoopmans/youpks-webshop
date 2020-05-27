<?php

namespace App\Traits;

trait CommonQueries
{
    /**
     * @param string $input
     * @param string $operator
     * @param string $column
     * @return mixed
     */
    public function where(string $input, string $operator, string $column)
    {
        return $this->model->where($input, $operator, $column);
    }

    /**
     * @param string $column
     * @return mixed
     */
    public function whereNotNull(string $column)
    {
        return $this->model->whereNotNull($column);
    }

}
