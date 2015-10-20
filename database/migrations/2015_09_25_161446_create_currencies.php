<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('flg');         //Active flag
            $table->string('currency_code');    //currency code i.e. THB
            $table->string('currency_desc');    //currency description
            $table->string('currency_sym');    //currency symbols
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
