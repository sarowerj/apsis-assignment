<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MinuteUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $beforeTimestamp = strtotime(date('Y-m-d H:i:s') . ' + 14 minute');
        $afterTimestamp = strtotime(date('Y-m-d H:i:s') . ' + 15 minute');


        $tasks = DB::table('tasks')
            ->where('task_deadline', '>', date('Y-m-d H:i:s', $beforeTimestamp))
            ->where('task_deadline', '<', date('Y-m-d H:i:s', $afterTimestamp))
            ->join('users', 'tasks.user_id', '=', 'users.id')->select('tasks.*', 'users.email', 'users.name')
            ->get();

        foreach ($tasks as $item) {
            Mail::raw($item->task_details, function ($message) use ($item) {
                $message->from('sarowerj@gmail.com');
                $message->to($item->email)->subject('Your task is expiring soon.');
            });
        }
    }
}
