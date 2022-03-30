<?php

namespace App\Services\TransactionLogic;

use App\Entities\Transaction;
use App\Enums\TransactionEnum;

class  DepositStrategy implements TransactionInterface
{
    protected $transaction;

    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    public function process($account): Transaction
    {
        $account->balance += $this->transaction->amount;
        $new_transaction = new Transaction();
        $new_transaction->amount = $this->transaction->amount;
        $new_transaction->type = TransactionEnum::DEPOSIT;
        $new_transaction->account_id = $account->id;
        return $new_transaction;
    }
}
