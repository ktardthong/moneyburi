<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carBrandname', function (Blueprint $table) {

            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     //default is active
            $table->string('images');                     //name of this bill
            $table->string('brandname');                     //name of this bill


            $table->timestamps();

            $table->index(['id']);
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
