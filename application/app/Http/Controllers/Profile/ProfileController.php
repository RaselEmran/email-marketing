<?php

namespace App\Http\Controllers\Profile;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Activity\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view logged in user profile
        $pageName = trans('common.Profile');
        $user = Auth::user();
        return view('profile.home', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // user photo uploaded
        // if upload file is exist
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $imageName = microtime(true).'.'.$extension;
            $destinationPath = 'upload/';
            $request->file('photo')->move($destinationPath, $imageName);

            $user_id = $request->input('user');
            $user = User::find($user_id);
            $user->photo = $imageName;
            $user->update();

            $user_id = Auth::id();
            $message = 'Uploaded Profile Photo.';
            Activity::saveActivity($user_id, $message);

            Session::flash('success_msg', 'Successfully uploaded photo');
            return redirect('profile');
        }
        return redirect('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        // show user profile
        $pageName = trans('common.Profile');
        $user = User::find($user_id);
        return view('profile.home', get_defined_vars());
    }

}
