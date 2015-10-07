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
            $table->increments('id');
            $table->tinyInteger('flg')->default(1);     // Active flag, default active when added
            $table->integer('uid');                     // user id
            $table->integer('cc_issuer');               // cc issuer
            $table->integer('cc_types');                // cc types
            $table->integer('cc_limit');                   // cc limit
            $table->integer('due_date');                   // due date of the month
            $table->string('card_notes')->nullable();   // user note
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
