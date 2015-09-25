<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_users', function (Blueprint $table) {
            $table->integer('id');
            $table->tinyInteger('flg');     //Active flag
            $table->integer('uid');         //user id
            $table->integer('cc_issuer');   //cc issuer
            $table->integer('cc_types');    //cc types
            $table->integer('limit');       //cc limit
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
