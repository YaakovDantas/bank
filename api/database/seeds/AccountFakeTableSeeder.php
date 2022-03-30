<?php

use Illuminate\Database\Seeder;
use App\Entities\Account;

class AccountFakeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Account::class, 10)->create();
    }
}
