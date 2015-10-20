<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WeeklySpendableTracker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WeeklySpendableTracker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sum and insert remaining_weekly ';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*$q="INSERT INTO spendable_tracker (uid, spendable, flg,created_at,remaining_week)
                            SELECT id,mth_spendable,1,now(),
                                                            SUM(CASE WHEN YEARWEEK(created_at, 1)
                                                            THEN t_transaction
                                                            ELSE 0 END) AS weeklyTrans
                            FROM   users

                            ";
        DB::insert($q);*/
    }
}
