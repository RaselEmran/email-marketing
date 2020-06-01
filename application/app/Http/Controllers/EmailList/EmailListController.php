<?php

namespace App\Http\Controllers\EmailList;

use App\Models\Api\EmailCheckerApi;
use App\Http\Controllers\Checker\EmailChecker;
use App\Http\Controllers\Checker\VerifyEmail;
use Illuminate\Http\Request;

use Auth;
use App\Models\Group\Group;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\EmailList\EmailList;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EmailListRequest;
use Excel;
use Log;

class EmailListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //loaded email list index page
        $pageName = trans('common.email-list');

        $groupNames = Group::lists('name', 'id');
        $groups = Group::all();

        $title = trans('common.create') . ' ' . trans('common.email-list');

        return view('emailList.home', get_defined_vars());
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

    public function store(emailListRequest $request, EmailList $model)
    {
        //create group name
        if ($request->has('name')) {
            $group = Group::create(['name' => $request->name, 'status' => 1]);
        }

        $data['group_id'] = 0;

        if ($request->has('existing_group_name')) {
            $data['group_id'] = $request->input('existing_group_name');
        }
//        return $request->all();
        if ($request->has('emails')) {
            $commaAndNew = str_replace("\r\n", ',', $request->emails);

            $string = array_unique(explode(",", $commaAndNew));
            if (array_search("", $string)) {
                $position = array_search("", $string);
                unset($string[$position]);
            }

            $validEmails = array_diff(validEmail($string), array(NULL));

            if (isset($group)) {
                $data['group_id'] = $group->id;
            }

            foreach ($validEmails as $email) {
                $data['email'] = $email;
                EmailList::create($data);
            }
        }

        if ($request->hasFile('excel_file')) {
            $extension = $request->file('excel_file')->getClientOriginalExtension();
            $fileName = microtime(true) . '.' . $extension;
            $destinationPath = storage_path('imports');
            $request->file('excel_file')->move($destinationPath, $fileName);

            $results = Excel::load(storage_path('imports/' . $fileName), function ($reader) {

            })->get(array('name', 'email'))->toArray();

            $validEmails = validEmailForFile($results);

            if (isset($group)) {
                $data['group_id'] = $group->id;
            }

            foreach ($validEmails as $emailInfo) {
                $data['name'] = $emailInfo['name'];
                $data['email'] = $emailInfo['email'];
                EmailList::create($data);
            }
        }


        Session::flash('success_msg', 'Successfully Added Email.');
        return redirect('email-list');
    }

    public function show(Group $group)
    {
        return view('emailList.emaillist', get_defined_vars());
    }

    public function edit(Group $groupList)
    {
        $groupNames = Group::lists('name', 'id');
        $pageName = trans('common.email-list');
        $groups = Group::all();
        $title = trans('common.edit') . ' ' . trans('common.email-list');

        return view('emailList.home', get_defined_vars());
    }


    public function update(emailListRequest $request, Group $model)
    {
//        $this->validate($request, [
//            'name' => 'required|max:255|unique:group',
//        ]);
        $model->update($request->all());

        Session::flash('success_msg', 'Successfully Updated Email List!');
        return redirect('email-list');
    }


    public function destroy(Group $groupList)
    {
        EmailList::where('group_id', $groupList->id)->delete();
        $groupList->delete();

        Session::flash('success_msg', 'Successfully Deleted');
        return redirect('email-list');
    }

    public function update_email_info(Request $request)
    {
        $emailList_id = $request->input('pk');
        $value = $request->input('value');
        $field = $request->input('name');
        $emailList = EmailList::find($emailList_id);

        if ($field == 'email') {
            $a = trim($value);
            if (!filter_var($a, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['type' => 'Warning', 'msg' => 'Invalid email, Please enter valid email.']);
            }

            $rules = [
                'email' => 'required|max:255|unique:email_list,email,$emailList->id,group_id',
            ];

            $validator = Validator::make(['email' => $value], $rules);
            if ($validator->fails()) {
                return response()->json(['type' => 'Warning', 'msg' => implode(', ', $validator->messages()->all())]);
            }
        }

//        $emailList = EmailList::find($emailList_id);
        $emailList->update([$field => $value]);


        return response()->json(['type' => 'Congrats', 'msg' => 'Successfully updated email information.']);
    }

    public function email_delete($emailList_id)
    {
        EmailList::find($emailList_id)->delete();
        Session::flash('success_msg', 'Successfully Deleted');
        return redirect()->back();
    }

    public function save_email(Request $request)
    {
        if ($request->ajax()) {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['group_id'] = $request->group_id;

            if ($data['email'] == '') {
                return response()->json(['type' => false, 'msg' => 'Email field is required.']);
            }

            $validEmails = array_diff(validEmail([$data['email']]), array(NULL));
            if (count($validEmails) > 0) {
                EmailList::create($data);
                return response()->json(['type' => true, 'msg' => 'Successfully saved email information.']);
            } else {
                return response()->json(['type' => false, 'msg' => 'Please enter valid email.']);

            }

        }
    }

    public function real_email($checker, $group_id)
    {
        if ($checker == 'bulkemailchecker') {
            $bulkEmailChecker = EmailCheckerApi::where('provider', 'bulkemailchecker')->first();
            if ($bulkEmailChecker && $bulkEmailChecker->key != '') {
                $emailChecker = new EmailChecker('bulkemailchecker', $bulkEmailChecker->key);
            } else {
                Session::flash('error_msg', 'Please enter Bulk email chcker information');
                return redirect('api');
            }
        } elseif ($checker == 'emaillistverify') {
            $emailListVerify = EmailCheckerApi::where('provider', 'emaillistverify')->first();
            if ($emailListVerify && $emailListVerify->key != '') {
                $emailChecker = new EmailChecker('emaillistverify', $emailListVerify->key);
            } else {
                Session::flash('error_msg', 'Please enter Email list verify information.');
                return redirect('api');
            }
        } elseif ($checker == 'freeemailverify') {
            $emailChecker = new VerifyEmail(Auth::user()->email);
//            $emailListVerify = EmailCheckerApi::where('provider', 'emaillistverify')->first();
//            if ($emailListVerify && $emailListVerify->key != '') {
//                $emailChecker = new EmailChecker('emaillistverify', $emailListVerify->key);
//            } else {
//                Session::flash('error_msg', 'Please enter Email list verify information.');
//                return redirect('api');
//            }
        } else {
            Session::flash('error_msg', 'Please select a email checker.');
            return redirect()->back();
        }

        $emails = EmailList::where('group_id', $group_id)->get();
        $deleted = 0;
        foreach ($emails as $email) {
            $json = $emailChecker->check($email->email);

            if ($checker == 'bulkemailchecker') {
                if ($json['status'] == 'failed') {
                    $email->update(['bulk_check' => 2, 'bulk_value' => json_encode($json)]);
//                    EmailList::destroy($email->id);
                    $deleted++;
                } else {
                    $email->update(['bulk_check' => 1, 'bulk_value' => json_encode($json)]);
                }
            } elseif ($checker == 'emaillistverify') {
                if ($json == 'ok') {
                    $email->update(['email_list_check' => 1, 'email_list_value' => $json]);
                } else {
                    $email->update(['email_list_check' => 2, 'email_list_value' => $json]);
//                    EmailList::destroy($email->id);
                    $deleted++;
                }
            } elseif ($checker == 'freeemailverify') {
                if ($json) {
                    $email->update(['free_email_check' => 1, 'free_email_value' => 'Valid Email']);
                } else {
                    $email->update(['free_email_check' => 2, 'free_email_value' => 'Invalid Email']);
//                    EmailList::destroy($email->id);
                    $deleted++;
                }
            }

            if (env('APP_ENV', false) == 'demo') {
                break;
            }
        }

        if ($checker == 'bulkemailchecker') {
            Group::find($group_id)->update(['bulk_check' => 1, 'bulk_check_date' => time()]);
        } elseif ($checker == 'emaillistverify') {
            Group::find($group_id)->update(['email_list_check' => 1, 'email_list_verify_date' => time()]);
        } elseif ($checker == 'freeemailverify') {
            Group::find($group_id)->update(['free_email_check' => 1, 'free_email_check_date' => time()]);
        }

        if (env('APP_ENV', false) == 'demo') {
            Session::flash('error_msg', 'Detected Invalid ' . $deleted . ' email address(es) in demo only 1 email can be checked.');
        } else {
            Session::flash('success_msg', 'Detected Invalid ' . $deleted . ' email address(es).');
        }
        return redirect()->back();
    }

    public function delete_invalid_email($checker, $group_id)
    {
        $count_deleted_email = EmailList::where('group_id', $group_id)->where($checker, 2)->count();
        EmailList::where('group_id', $group_id)->where($checker, 2)->delete();

        Session::flash('success_msg', 'Successfully deleted ' . $count_deleted_email . ' email address(es).');
        return redirect()->back();
    }

}