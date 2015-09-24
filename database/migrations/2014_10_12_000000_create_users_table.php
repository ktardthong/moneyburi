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
            $table->string('username')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('gender');
            $table->string('city');
            $table->string('country');
            $table->date('birthdate');
            $table->tinyInteger('init_setup')->default(0);
            $table->rememberToken();
            $table->tinyInteger('prefer_pmt')->default(0);
            $table->decimal('budget_alloc', 18, 2)->default(0);
            $table->decimal('mth_income', 18, 2)->default(0);
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
