<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class UnDoneIssues extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    private $issues;


    /**
     * Create a new message instance.
     * @param Collection $issues
     */
    public function __construct(Collection $issues)
    {
        $this->issues = $issues;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.UndoneIssues',['issues' => $this->issues]);
    }
}
