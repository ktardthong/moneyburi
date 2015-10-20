<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_car', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     //default is active
            $table->integer('uid');                     //user_id
            $table->string('name');                     //name of auto
            $table->string('brand');                    //auto brand
            $table->string('model');                    //auto model
            $table->decimal('price', 18, 2);            //price
            $table->decimal('interest', 18, 2);         //interest
            $table->decimal('down_pmt', 18, 2);         //interest
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
