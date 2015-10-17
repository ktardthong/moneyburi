<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_tracker', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     //default is active
            $table->integer('goal_id');                 //goalId from external table
            $table->integer('uid');                     //user_id
            $table->integer('goal_type');               //1.general,2. travel,3 car 4 home
            $table->integer('goal_exp_pmt');            //Goal expense per month
            $table->integer('duation_mth');             //Goal duration in month
            $table->integer('completed_month');         //number of times that user accomplished
            $table->integer('is_completed');            //if this goal is completed

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
