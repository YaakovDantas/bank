<?php

namespace App\Services;

use App\Exceptions\BusinessException;
use App\Repositories\AccountRepository;
use App\Repositories\TransactionRepository;
use App\Services\TransactionLogic\TransactionFactory;

class AccountService extends BaseService
{
    protected $transactionRepository;

    public function __construct(
        AccountRepository $accountRepository,
        TransactionRepository $transactionRepository
    ) {
        $this->NotFoundMessage = "Account not found!";
        $this->repository = $accountRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function processTransaction($transaction)
    {
        $account = $this->repository->findAccount(
            $transaction->account_number,
            $transaction->account_code,
            $transaction->agency
        );

        if (!$account) {
            throw new BusinessException('Invalid account information.', 400);
        }

        $transaction = TransactionFactory::generate($transaction);
        $transaction = $transaction->process($account);

        $transaction->save();
        $account->save();

        return $transaction;
    }

    public function history($account_number, $account_code, $agency)
    {
        $account = $this->repository->findAccount($account_number, $account_code, $agency);

        if (!$account) {
            throw new BusinessException('Invalid account information.', 400);
        }

        return $account->transactions()->get();
    }

    public function balance($account_number, $account_code, $agency)
    {
        $account = $this->repository->findAccount($account_number, $account_code, $agency);

        if (!$account) {
            throw new BusinessException('Invalid account information.', 400);
        }

        return [ "balance" => $account->first()->balance ];
    }
}
