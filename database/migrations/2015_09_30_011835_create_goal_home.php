<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalHome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_home', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     //default is active
            $table->integer('uid');                     //user_id
            $table->string('name');                     //name of this goal
            $table->string('where');                    //where is the home
            $table->decimal('price', 18, 2);            //price
            $table->decimal('interest', 18, 2);         //interest
            $table->integer('duration');                //payments duration in month


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
