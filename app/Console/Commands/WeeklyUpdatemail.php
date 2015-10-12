<?php
/**
 * Created by PhpStorm.
 * User: cholathit
 * Date: 10/12/15
 * Time: 2:10 AM
 */
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Auth;

class WeeklyUpdateMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WeeklyUpdateMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send weekly update emails to users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = Auth::user();
        Mail::send('mails.weekly_update', ['user' =>  $user], function ($m) use ($user) {
            $m->to($user->email)->subject('Weekly Update from Moneyburi');
        });
    }
}
