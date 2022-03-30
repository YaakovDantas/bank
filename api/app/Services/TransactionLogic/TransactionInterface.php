<?php

namespace App\Services\TransactionLogic;

use App\Entities\Transaction;

interface  TransactionInterface
{
    public function process($account): Transaction;
}
