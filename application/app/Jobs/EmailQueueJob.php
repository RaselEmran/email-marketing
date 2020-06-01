<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Mail;

class EmailQueueJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $emailTemplate;
    public $list;
    public $subject;

    /**
     * Create a new job instance.
     *
     * @return void
     *
     */
    public function __construct($emailTemplate, $list, $subject)
    {
        $this->emailTemplate = $emailTemplate;
        $this->list = $list;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emailTemplate = $this->emailTemplate;
        $list = $this->list;
        $subject = $this->subject;


        Mail::queue('emails.template', ['emailTemplate' => $emailTemplate], function ($message) use ($list, $subject) {
            $message->to($list)->subject($subject);
        });
    }
}
