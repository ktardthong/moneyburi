<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class UpdateGoalDuration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateGoalDuration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment the the duration of goal each month, as long as the
                              duration_complete does not exceed duration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //GOAL TRAVEL
        $qt="UPDATE 	    goal_travel
            SET         duration_complete  = duration_complete +1
            WHERE		duration_complete < duration
            AND			flg=1";

        //GOAL CAR
        $qc="UPDATE 	    goal_car
            SET         duration_complete  = duration_complete +1
            WHERE		duration_complete < duration
            AND			flg=1";

        //GOAL GENERAL
        $qg="UPDATE 	    goal_general
            SET         duration_complete  = duration_complete +1
            WHERE		duration_complete < duration
            AND			flg=1";

        //GOAL HOME
        $qh="UPDATE 	    goal_home
            SET         duration_complete  = duration_complete +1
            WHERE		duration_complete < duration
            AND			flg=1";


        if(!DB::update($qt)){
            echo "log error - travel";
        }
        if(!DB::update($qc)){
            echo "log error - car";
        }
        if(!DB::update($qg)){
            echo "log error - general";
        }
        if(!DB::update($qh)){
            echo "log error - home";
        }

        /**
         * Update the flg to zero is goal completed
        */
        $qu="UPDATE 	goal_general
             SET	    flg=0
             WHERE		duration_complete = duration";
        DB::update($qu);

        $qu="UPDATE 	goal_travel
             SET	    flg=0
             WHERE		duration_complete = duration";
        DB::update($qu);

        $qu="UPDATE 	goal_car
             SET	    flg=0
             WHERE		duration_complete = duration";
        DB::update($qu);

        $qu="UPDATE 	goal_home
             SET	    flg=0
             WHERE		duration_complete = duration";
        DB::update($qu);



    }
}
