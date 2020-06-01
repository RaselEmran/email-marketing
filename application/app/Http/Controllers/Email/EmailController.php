<?php

namespace App\Http\Controllers\Email;

use Illuminate\Http\Request;

use File;
use Session;
use App\Http\Requests;
use App\Models\Email\Email;
use App\Http\Controllers\Controller;


class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //loaded email settings index page
        $pageName= trans('common.email').' '.trans('common.settings');
        $config = Email::first();
        return view('email_settings.home', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //saved and updated email settings info
    public function store(Request $request)
    {
        if(!is_writable(base_path() . '/.env')){
            Session::flash('success_msg', base_path() . '/.env');
            return redirect('email');
        }
        //set default mail driver into .env
        $env = File::get(base_path() . '/.env');
        $changeEnv = str_replace('MAIL_DRIVER='.env('MAIL_DRIVER'), 'MAIL_DRIVER='.$request->mail_driver, $env);
        File::put(base_path().'/.env', str_replace(' ', '', $changeEnv));
        // check mail type is smtp or phpmail
        // if smtp get smtp information from database
        if($request->mail_driver == 'smtp') {
            $email = Email::first();
            foreach ($request->except(['_token', 'mail_driver']) as $key => $value) {
                if (!empty($email)) {
                    if (!$email->{$key}) {
                        $mail_key = str_replace('smtp', 'mail', $key);
                        $content = "\n" . strtoupper($mail_key) . '=' . $value;
                        File::append(base_path() . '/.env', str_replace(' ', '', $content));
                    } else {
                        //.env file updated with email settings info
                        $mail_key = str_replace('smtp', 'mail', $key);

                        $preCont = File::get(base_path() . '/.env');

                        $newCont = str_replace(strtoupper($mail_key) . '=' . env(strtoupper($mail_key)), strtoupper($mail_key) . '=' . $value, $preCont);

                        File::put(base_path() . '/.env', str_replace(' ', '', $newCont));
                    }
                    $email->{$key} = str_replace(' ', '', $value);
                    $email->update();
                    Session::flash('success_msg', 'Updated Successfully');

                } else {
                    $mail_key = str_replace('smtp', 'mail', $key);
                    $content = "\n" . strtoupper($mail_key) . '=' . str_replace(' ', '', $value);
                    File::append(base_path() . '/.env', str_replace(' ', '', $content));

                    $email = new Email();
                    $email->{$key} = $value;
                    $email->save();
                    Session::flash('success_msg', 'Inserted Successfully');
                }

            }
        } else if($request->mail_driver == 'mail'){// else send mail by phpmail
            Session::flash('success_msg', 'Updated Successfully');
        }
        return redirect('email');
    }
}
