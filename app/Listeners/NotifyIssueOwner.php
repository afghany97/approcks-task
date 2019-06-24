<?php

namespace App\Listeners;

use App\Issue;
use Berkayk\OneSignal\OneSignalFacade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyIssueOwner implements ShouldQueue
{
    /**
     * @var Issue
     */
    private $issue;

    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        OneSignalFacade::sendNotificationToAll(
            "Your Issue  {$event->issue->title} have some new updates.",
            $url = "https://google.com",
            $data = ['name' => 'Jon DOe'],
            $buttons = [[ "id" => "like-button",
                "text" => "Like",
                "icon" => "http://i.imgur.com/N8SN8ZS.png",
                "url" => "https://google.com"]],
            $schedule = null
        );

    }
}
