<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('fb_id')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('gender');
            $table->integer('status');                      //0 -> single, 3 -> married
            $table->integer('job');                         //user job -> users_jobs table
            $table->string('city');
            $table->string('country');
            $table->integer('currency')->default(2);        //currency from currencies table, default->THB
            $table->string('avatar');
            $table->date('birthdate');
            $table->tinyInteger('init_setup')->default(0);
            $table->rememberToken();
            $table->decimal('mth_income', 18, 2)->default(0);
            $table->decimal('mth_bill', 18, 2)->default(0);
            $table->decimal('mth_spendable', 18, 2)->default(0);
            $table->decimal('mth_saving', 18, 2)->default(0);
            $table->decimal('d_saving', 18, 2)->default(0);
            $table->decimal('d_spendable', 18, 2)->default(0);
            $table->decimal('net_worth', 18, 2)->default(0);
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
        Schema::drop('users');
    }
}
