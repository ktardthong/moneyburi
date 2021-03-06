<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendableTracker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spendable_tracker', function (Blueprint $table) {

            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     //default is active
            $table->integer('ref_id');                  //reference from reference table
            $table->integer('uid');                     //user_id

            $table->decimal('spendable', 18, 2);            //user spendable per day this is from user table
            $table->decimal('adjusted', 18, 2)->default(0);             //if user adjust their spendable from user table

            $table->decimal('t_transaction', 18, 2)->default(0);        //Transaction at one time
            $table->decimal('ttl_transaction', 18, 2)->default(0);    //Total transaction per day

            $table->decimal('remaining_day', 18, 2)->default(0);       //if user adjust their spendable from user table
            $table->decimal('remaining_week', 18, 2)->default(0);      //if user adjust their spendable from user table
            $table->decimal('remaining_month', 18, 2)->default(0);      //if user adjust their spendable from user table
            $table->decimal('remaining_year', 18, 2)->default(0);       //if user adjust their spendable from user table

            $table->timestamps();

            $table->index(['id','uid','ref_id']);
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
