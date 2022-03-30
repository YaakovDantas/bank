<?php

namespace App\Repositories;

use App\Entities\Account;

class AccountRepository extends BaseRepository
{
    public function __construct(Account $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $data['password'] = $this->model->encryptPassword($data['password']);
        return parent::create($data);
    }

    public function findAccount($account_number, $account_code, $agency)
    {
        return $this->model
                    ->where('account_number', $account_number)
                    ->where('account_code',  $account_code)
                    ->where('agency', $agency)
                    ->first();
    }
}
