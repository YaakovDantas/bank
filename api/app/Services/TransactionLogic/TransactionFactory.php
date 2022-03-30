<?php

namespace App\Services\TransactionLogic;

use App\Exceptions\BusinessException;
use App\Enums\TransactionEnum;

class  TransactionFactory
{
    public static function generate($transacion): TransactionInterface
    {
        switch($transacion->type) {
            case TransactionEnum::DRAFT :
                return new DraftStrategy($transacion);
            case TransactionEnum::DEPOSIT :
                return new DepositStrategy($transacion);
            default:
                throw new BusinessException('Invalid transaction type', 400);
        }
    }
}
