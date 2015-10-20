<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flg')->default(1);      //just in case
            $table->string('name');          //repeat name
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
