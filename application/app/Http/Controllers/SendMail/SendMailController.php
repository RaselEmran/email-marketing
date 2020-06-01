<?php

namespace App\Http\Controllers\SendMail;

use App\Models\EmailLater\EmailLater;
use App\Models\EmailHistory\EmailHistory;
use App\Models\Group\Group;
use App\Models\EmailList\EmailList;
use App\Models\Template\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\EmailQueueJob;
use Session;
use Auth;
use DateTime;
use DateTimeZone;

class SendMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //loaded send maail list index page
        $pageName = trans('common.send-mail');
        $groups = Group::lists('name', 'id');
//        $emailLists = EmailList::lists('name', 'id');
        $templates = Template::lists('name', 'id');

        $title = trans('common.send-mail');

        return view('sendMail.home', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        set_time_limit(1200);
        if (!$request->has('template')) {
            Session::flash('error_msg', 'Please select template.');
            return redirect()->back()->withInput($request->only(['email_identifier']));
        }
        if (!$request->has('subject')) {
            Session::flash('error_msg', 'Subject field is required.');
            return redirect()->back()->withInput($request->only(['email_identifier']));
        }

        $emailLists = [];
        $send_later = 0;
        if ($request->email_identifier == 'emails') {

            if ($request->has('emails')) {
                $commaAndNew = str_replace("\r\n", ',', $request->emails);

                $string = array_unique(explode(",", $commaAndNew));
                if (array_search("", $string)) {
                    $position = array_search("", $string);
                    unset($string[$position]);
                }
                $emailLists = array_diff(validEmail($string), array(NULL));
                if(count($emailLists) > 0){
                    $lists = [];
                    foreach($emailLists as $email){
                        $lists[] = [
                            'email' => $email,
                            'name' => ''
                        ];
                    }
                    $emailLists = $lists;
                }

            } else {
                Session::flash('error_msg', 'Email field is required.');
                return redirect()->back()->withInput($request->only(['email_identifier']));
            }
            $send_later = $request->send_later_email;

        } else if ($request->email_identifier == 'group') {

            if ($request->has('allgroup')) {

                $emailLists = EmailList::get(['email', 'name'])->toArray();
            } else {

                if (count($request->group) == 0) {
                    Session::flash('error_msg', 'Please select group.');
                    return redirect()->back()->withInput($request->only(['email_identifier']));
                }

                $emailLists = EmailList::where('group_id', $request->group)->groupBy('email')->get(['email', 'name'])->toArray();
            }
            $send_later = $request->send_later_group;
        } else {
            Session::flash('error_msg', 'Not defined group mail or single mail.');
            return redirect()->back()->withInput($request->only(['email_identifier']));
        }

        if (count($emailLists) == 0) {
            Session::flash('error_msg', 'There is no any valid email.');
            return redirect()->back()->withInput($request->only(['email_identifier']));
        }


        $emailTemplate = Template::find($request->template)->template;
        $subject = $request->subject;

        $count_email = count($emailLists);

        if (env('APP_ENV', false) == 'demo') {
//            $emailLists = $emailLists->toArray();
            array_splice($emailLists, 1);
        }
        if ($send_later == '1') {
            if ($request->has('datetime')) {
                $datetime = new DateTime($request->datetime);
                if ($request->timezone > 0) {
                    $datetime->modify('-' . $request->timezone . ' hours');
                }

                $emailLater = [
                    'sender_id' => Auth::id(),
                    'email_list' => json_encode($emailLists),
                    'template_id' => $request->template,
                    'subject' => $subject,
                    'send_time' => $datetime->getTimestamp()
                ];

                EmailLater::create($emailLater);

                Session::flash('success_msg', 'Your email will be sent on ' . $request->datetime);
            } else {
                    Session::flash('error_msg', 'Please select valid date and time for sending later.');
                    return redirect()->back()->withInput($request->only(['email_identifier']));
            }
        }else {
            foreach ($emailLists as $emailList) {
                $jobs = (new EmailQueueJob(str_replace('{USERNAME}', $emailList['name'], $emailTemplate), $emailList['email'], $subject))->delay(1);
                $this->dispatch($jobs);
            }
            $emailHistory = [
                'sender_id' => Auth::id(),
                'email_list' => json_encode($emailLists),
                'template_id' => $request->template,
                'subject' => $subject
            ];

            EmailHistory::create($emailHistory);

            if (env('APP_ENV', false) == 'demo' && ($count_email > 1)) {
                Session::flash('success_msg', 'You can only send 1 email in demo version.');
            } else {
                Session::flash('success_msg', 'Successfully sent emails.');
            }
        }
        return redirect('send-mail');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
