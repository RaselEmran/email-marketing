<?php

namespace App\Http\Controllers\Oauth;

use Log;
use File;
use Auth;
use Session;
use App\Http\Requests;
use App\Models\Oauth\Oauth;
use Illuminate\Http\Request;
use App\Models\Activity\Activity;
use App\Http\Controllers\Controller;

class OauthController extends Controller
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

    public function index(Request $request)
    {
        //by default load facebook oauth configuration page
        $oauths = Oauth::lists('value', 'name');
        if($request->input('platform') == ''){
            $pageName=trans('common.facebook').' '.trans('common.Settings') ;
        }else{
        $pageName = ucfirst($request->input('platform')).' '.trans('common.Settings') ;
        }

        return view('oauth.home', get_defined_vars());
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
        $oauth_data = Oauth::get()->pluck('name')->toArray();

        $crea_upda = 0;
        foreach ($request->except(['_token']) as $key => $value) {

            if(in_array($key, $oauth_data)) {
                //updated oauth configuration
                $oauths = Oauth::where('name', $key)->first();

                //update .env file with oauth configuration crediantial
                $preCont = File::get(base_path().'/.env');

                $newCont = str_replace(strtoupper($key).'='.$oauths->value, strtoupper($key).'='.$value, $preCont);

                File::put(base_path().'/.env', $newCont);

                $oauths->value = $value;
                $oauths->update();

                $crea_upda = 2;
                Session::flash('success_msg', 'Updated Successfully');

            } else {
                //inserted oauth configuration
                $content = "\n".strtoupper($key).'='.$value;
                File::append(base_path().'/.env', $content); //.env file is appended with oauth configuration

                $oauth = new Oauth();
                $oauth->name = $key;
                $oauth->value = $value;
                $oauth->save();
                $crea_upda = 1;

                Session::flash('success_msg', 'Inserted Successfully');
            }

        }

        $user_id = Auth::id();

        $platform = explode('_', $key)[0];

        if($crea_upda == 1){
            $message = "Added $platform Oauth info.";
        } else if($crea_upda == 2) {
            $message = "Updated $platform Oauth info.";
        } else{
            $message = 'Nothing.';
        }

        //save activity
        Activity::saveActivity($user_id, $message);

        return redirect('oauth');

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
