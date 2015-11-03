<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCancelInGoalTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add column for cancellation
        Schema::table('goal_car', function ($table) {
            $table->integer('is_cancel')->default(0)->after('flg');
            $table->index('is_cancel');
        });

        Schema::table('goal_home', function ($table) {
            $table->integer('is_cancel')->default(0)->after('flg');
            $table->index('is_cancel');
        });

        Schema::table('goal_general', function ($table) {
            $table->integer('is_cancel')->default(0)->after('flg');
            $table->index('is_cancel');
        });

        Schema::table('goal_travel', function ($table) {
            $table->integer('is_cancel')->default(0)->after('flg');
            $table->index('is_cancel');
        });

        Schema::table('users', function ($table) {
            $table->decimal('goal_saving', 18, 4)->default(0)->after('mth_saving');
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
