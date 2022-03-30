<?php

namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    public function all(array $columns = ['*'])
    {
        return $this->model->all('*');
    }

    public function find($id, $columns = ['*'], $with = null)
    {
        if($with) {
            return $this->model->with($with)->find($id, $columns);
        }
        return $this->model->find($id, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data)
    {
        return $this->model->update($data);
    }
}
