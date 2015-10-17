<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalTravel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_travel', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     //default is active
            $table->integer('uid');                     //user_id
            $table->string('where_to');                 //where travel to
            $table->decimal('lat', 18, 10)->nullable();//lat
            $table->decimal('lng', 18, 10)->nullable();//lng
            $table->decimal('budget', 18, 2);           //budget
            $table->integer('pax');                     //number of pax
            $table->integer('nights');                  //number of nights
            $table->integer('periods');                 //number of saving until goal achieved
            $table->integer('mth_saving');              //how much need to be save per month
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
