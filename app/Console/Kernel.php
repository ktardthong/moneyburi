<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\DailySpendableTracker::class,
        \App\Console\Commands\WeeklyUpdateMail::class,
        \App\Console\Commands\UpdateGoalDuration::class
//        \App\Console\Commands\WeeklySpendableTracker::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->command('DailySpendableTracker')
                 ->everyMinute();

        $schedule->command('UpdateGoalDuration')
                 ->everyMinute();

        $schedule->command('WeeklyUpdateMail')
                 ->weeklyOn(2, '20:00');

        /*$schedule->command('WeeklySpendableTracker')
            ->everyMinute();*/

    }
}
