<?php

namespace App\Repositories;

use App\Entities\Transaction;

class TransactionRepository extends BaseRepository
{
    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }
}
