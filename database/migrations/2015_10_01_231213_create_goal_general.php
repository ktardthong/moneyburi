<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_general', function (Blueprint $table) {

            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     //default is active
            $table->integer('uid');                     //user_id
            $table->string('name');                     //name of this goal
            $table->string('where')->nullable();        //where is the home
            $table->string('where_id')->nullable();     //external id from FB etc
            $table->decimal('price', 18, 2);            //price
            $table->integer('duration');                //payments duration in month
            $table->integer('paid_duration');           //number of months paid
            $table->decimal('interest', 18, 2);         //interest

            $table->timestamps();
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
