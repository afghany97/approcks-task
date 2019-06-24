<?php

namespace App\Console\Commands;

use App\Mail\UnDoneIssues;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailUserWithUnDoneTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail to users with un-done issues';

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
        $users = User::all();

        $undoneIssues = [];

        foreach ($users as $user) {

            foreach ($user->issues as $issue) {

                if ($issue->record->name != "done") {

                    array_push($undoneIssues, $issue);
                }
            }

            Mail::to($user)->send(new UnDoneIssues(collect($undoneIssues)));

        }

    }
}
