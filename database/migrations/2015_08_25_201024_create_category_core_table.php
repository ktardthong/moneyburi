<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryCoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_core', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('th_name')->index();
            $table->tinyInteger('flg');
            $table->string('icon');
            $table->timestamps();

            $table->index(['id', 'name','th_name']);
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
