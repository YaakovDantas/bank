<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'amount',
        'type',
        'account_id',
        'created_at'
    ];

    protected $hidden = ['updated_at'];

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
