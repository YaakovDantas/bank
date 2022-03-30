<?php

namespace App\Services\TransactionLogic;

use App\Exceptions\BusinessException;
use App\Entities\Transaction;
use App\Enums\TransactionEnum;


class  DraftStrategy implements TransactionInterface
{
    protected $transaction;

    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    public function process($account): Transaction
    {
        if (!$account->checkPassword($this->transaction->password)) {
            throw new BusinessException('It was not possible to continue with this operation, invalid credentials.', 400);
        }

        if (($account->balance < $this->transaction->amount) || !$this->transaction->amount) {
            throw new BusinessException('Insufficient balance to complete this transaction.', 400);
        }

        $account->balance -= abs($this->transaction->amount);
        $new_transaction = new Transaction();
        $new_transaction->amount = abs($this->transaction->amount);
        $new_transaction->type = TransactionEnum::DRAFT;
        $new_transaction->account_id = $account->id;

        return $new_transaction;
    }
}
