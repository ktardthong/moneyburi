<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DailySpendableTracker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DailySpendableTracker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert daily spendable from users table';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $q="INSERT INTO spendable_tracker (uid, spendable, flg,created_at)
                            SELECT id,mth_spendable,1,now()
                            FROM   users";
        DB::insert($q);
//        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
