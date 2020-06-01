<?php

namespace App\Console\Commands;

use App\Models\EmailHistory\EmailHistory;
use App\Models\Template\Template;
use App\Models\EmailLater\EmailLater;
use App\Jobs\EmailQueueJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Console\Command;
use Log;

class Email_later extends Command
{
    use DispatchesJobs;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:later';

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
        $emailLater = EmailLater::all();

        foreach ($emailLater as $email) {
            if ($email->send_time == strtotime(date('d-m-Y h:i a', time()))) {
                $emailTemplate = Template::find($email->template_id)->template;
                $emailLists = json_decode($email->email_list);
                $subject = $email->subject;

                if(env('APP_ENV', false) == 'demo') {
                    $emailLists = [array_values($emailLists)[0]];
                }

                for ($i = 0; $i < count($emailLists); $i++) {
                    $jobs = (new EmailQueueJob(str_replace('{USERNAME}', $emailLists[$i]->name, $emailTemplate), $emailLists[$i]->email, $subject))->delay(1);
                    $this->dispatch($jobs);
                }

                $emailHistory = [
                    'sender_id' => $email->sender_id,
                    'email_list' => json_encode($emailLists),
                    'template_id' => $email->template_id,
                    'subject' => $email->subject
                ];

                EmailHistory::create($emailHistory);
            }
        }
    }
}
