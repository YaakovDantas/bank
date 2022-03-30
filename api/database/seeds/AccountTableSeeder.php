<?php

use Illuminate\Database\Seeder;
use App\Entities\Account;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $accounts = [
            [
                "name" => "Thiago Dantas",
                "password" => Account::encryptPassword("1111"),
                "account_number" => "111",
                "account_code" => "22",
                "balance" => 1000,
                "agency" => "333"
            ]
        ];

        foreach ($accounts as $account) {
            Account::create($account);
        }
    }
}
