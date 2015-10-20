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
            $table->string('where')->nullable();        //where is the goal
            $table->string('where_id')->nullable();     //external id from FB etc
            $table->decimal('price', 18, 2);            //price
            $table->decimal('lat', 18, 10)->nullable(); //where lat
            $table->decimal('lng', 18, 10)->nullable(); //where lng
            $table->integer('pmt');                     //amount per month
            $table->integer('periods');                 //number of saving until goal achieved
            $table->integer('period_complete');         //number of period past
            $table->integer('month');
            $table->integer('year');

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
