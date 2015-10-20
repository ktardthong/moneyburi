<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');                     //user_id
            $table->tinyInteger('flg')->default(1);     //if transaction is active
            $table->integer('cate_id');                 //transaction categories
            $table->tinyInteger('trans_type');          //1 =expense, 2= income
            $table->tinyInteger('trans_repeat');        //repeat type 0=none, 1=daily,2=weekly,3=monthly,4 = yearly
            $table->tinyInteger('pmt_type');            //types of payment, 0 = cash,1 =credit
            $table->decimal('amount', 18, 2);           //amount
            $table->biginteger('location')->default(0); //facebook location ID
            $table->string('note')->nullable();         //transaction note
            $table->date('trans_date');                 //transaction date

            //GEO DATA
            $table->decimal('lat', 18, 10)->nullable();
            $table->decimal('lng', 18, 10)->nullable();
            $table->string('cityName')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('countryCode')->nullable();

            $table->timestamps();

            $table->index(['id', 'uid','cate_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
