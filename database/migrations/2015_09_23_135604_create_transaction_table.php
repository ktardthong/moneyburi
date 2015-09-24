<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->tinyInteger('flg')->default(1);
            $table->integer('cate_id');
            $table->string('note')->nullable();
            $table->date('trans_date');
            $table->decimal('amount', 18, 2);
            $table->tinyInteger('trans_type');
            $table->tinyInteger('repeat');
            $table->tinyInteger('pmt_type');

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
