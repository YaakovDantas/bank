<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'name',
        'balance',
        'account_number',
        'account_code',
        'agency',
        'password'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public static function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }
}
