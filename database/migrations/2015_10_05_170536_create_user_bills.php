<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bills', function (Blueprint $table) {

            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     //default is active
            $table->tinyInteger('is_paid')->default(0); //if the bill has been paid
            $table->integer('uid');                     //user_id
            $table->string('name');                     //name of this bill
            $table->integer('cate_id');                 //Dtransaction categories
            $table->integer('prefer_pmt');               //prefer payment cash or credit card
            $table->decimal('amount', 18, 2);           //amount
            $table->integer('due_date');                //the date number of every month

            $table->timestamps();

            $table->index(['id','uid']);
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
