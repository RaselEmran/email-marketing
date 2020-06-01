<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Api\EmailCheckerApi;
use Session;

class ApiController extends Controller
{
    public function index()
    {
        //loaded bulk email checker api index page
        $pageName = trans('common.api');

        $bulkEmailChecker = EmailCheckerApi::where('provider', 'bulkemailchecker')->first();
        $emailListVerify = EmailCheckerApi::where('provider', 'emaillistverify')->first();

        return view('api.home', get_defined_vars());
    }

    public function store(Request $request)
    {
        if(env('APP_ENV', false) == 'demo'){
            Session::flash('error_msg', 'Not submitted in demo version.');
            return redirect()->back();
        }

        if ($request->has('bulkemailchecker') || $request->has('emaillistverify')) {
            $bulkemailchecker = EmailCheckerApi::where('provider', 'bulkemailchecker')->first();
            if ($bulkemailchecker) {
                $bulkemailchecker->update(['key' => $request->input('bulkemailchecker')]);
            } else {
                EmailCheckerApi::create(
                    [
                        'provider' => 'bulkemailchecker',
                        'key' => $request->input('bulkemailchecker')
                    ]);
            }

            $emailListVerify = EmailCheckerApi::where('provider', 'emaillistverify')->first();
            if ($emailListVerify) {
                $emailListVerify->update(['key' => $request->input('emaillistverify')]);
            } else {
                EmailCheckerApi::create(
                    [
                        'provider' => 'emaillistverify',
                        'key' => $request->input('emaillistverify')
                    ]);
            }

            Session::flash('success_msg', 'Successfully Added.');
        } else {
            Session::flash('error_msg', 'Please enter key.');
        }
        return redirect('api');
    }
}
