<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMbErrorLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_log', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('ref_id');          //use the ref id from reference table
            $table->string('name');             //error log name
            $table->string('description');      //error log description
            $table->integer('severity');        //how bad is it 1-4, 1 being the highest
            $table->string('var_1');            //Addition variable that cause error
            $table->string('var_2');            //Addition variable that cause error
            $table->string('var_3');            //Addition variable that cause error

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
