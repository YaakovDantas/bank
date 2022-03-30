<?php

namespace App\Services;

use App\Exceptions\BusinessException;

abstract class BaseService
{
    protected $repository;
    protected $NotFoundMessage;

    public function all()
    {
        return $this->repository->all(['*']);
    }

    public function find($id)
    {
        $model = $this->repository->find($id);
        if(!$model) {
            throw new BusinessException($this->NotFoundMessage, 404);
        }

        return $model;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

}
