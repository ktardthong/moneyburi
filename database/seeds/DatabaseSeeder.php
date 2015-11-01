<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CCIssuerSeeder::class);
        $this->call(CCTypeSeeder::class);
        $this->call(CategoryCoreSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(TransRepeatSeeder::class);
        $this->call(TranstypeSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(UserjobSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(ReferenceTableSeeder::class);
        $this->call(SpendableTrackerTableSeeder::class);
        $this->call(MoneyQuoteSeeder::class);
        $this->call(carBrandSeeder::class);

        Model::reguard();
    }
}
