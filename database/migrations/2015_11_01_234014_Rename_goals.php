<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameGoals extends Migration
{

    /*
     * In this migration
     * Rename goals columns making it more universal
     * Add columns to make then naming more universal across table
     */


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add column duration complete
        Schema::table('goal_car', function ($table) {
            $table->integer('duration_complete')->after('duration');
        });

        Schema::table('goal_home', function ($table) {
            $table->integer('duration_complete')->after('duration');
            $table->decimal('mth_saving', 18, 4)->after('duration_complete');
        });


        //Renaming stuff

        Schema::table('goal_travel', function ($table) {
            $table->renameColumn('periods', 'duration');
            $table->renameColumn('period_complete', 'duration_complete');
        });

        Schema::table('goal_general', function ($table) {
            $table->renameColumn('periods', 'duration');
            $table->renameColumn('period_complete', 'duration_complete');
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
