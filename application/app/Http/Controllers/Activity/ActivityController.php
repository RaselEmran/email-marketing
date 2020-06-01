<?php

namespace App\Http\Controllers\Activity;

use Auth;
use App\User;
use App\Http\Requests\Request;
use App\Models\Activity\Activity;
use App\Http\Controllers\Controller;
use Session;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageName=trans('common.all_activities');
        //get all activities
        $activities = Activity::all();

        return view('activity.home', get_defined_vars());
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        //get all activities by user_id
        $activities = Activity::where('user_id', $user_id)->get();
        $pageName=trans('common.all_activities');;
        return view('activity.home', get_defined_vars());
    }

    public function clear_activities(){
        if(Auth::user()->role == 'admin') {
            Activity::truncate();
            Session::flash('success_msg', 'Deleted all Activities successfully');
            return redirect('activities');
        } else {
            Session::flash('success_msg', 'Only Admin can clear activities.');
            return redirect('activities');
        }
    }
}
