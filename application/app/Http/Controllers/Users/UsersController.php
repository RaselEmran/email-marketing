<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Models\Activity\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Users\UsersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function index()
    {
//        return  \App\Models\Config\Config::where('key', 'site_name')->pluck('vlaue')->first();
        $title = trans('common.add') . ' ' . trans('common.user');
        // get all users
        $allUsers = User::all();
        $pageName = trans('common.all') . ' ' . trans('common.users');
        return view('users.home', get_defined_vars());
    }

    // add new user
    public function store(UsersRequest $request, User $user)
    {
        if (Auth::user()->role == 'admin') {
            // get all request data from

            $allRequest = $request->all();
            $allRequest['password'] = Hash::make($request->password);
            $allRequest['status'] = 'Active';
            $user = $user->create($allRequest);

            $user_id = Auth::id();
            $message = 'Created user ' . $user->email;
            //save into activity
            Activity::saveActivity($user_id, $message);

            Session::flash('success_msg', 'Successfully created a User.');
        } else {
            Session::flash('error_msg', 'Only Admin can create user account.');
        }
        return redirect('users');
    }

    public function edit(User $User)
    {
        if (Auth::user()->role == 'admin' || $User->id == Auth::id()) {
            //get all user
            $allUsers = User::all();
            $userInfo = $User;
            $title = trans('common.edit') . ' ' . trans('common.user');

            return view('users.home', get_defined_vars());
        } else {
            Session::flash('error_msg', 'Only Admin can update user account.');
            return redirect('users');
        }
    }

    public function update(UsersRequest $request, User $user)
    {
        if (Auth::user()->role == 'admin' || $user->id == Auth::id()) {
            //updated user info
            $data['name'] = $request->name;
            if ($request->email != $user->email) {
                $data['email'] = $request->email;
            }
            $user->update($data);

            $user_id = Auth::id();
            $message = 'Updated user ' . $user->email;
            Activity::saveActivity($user_id, $message);

            Session::flash('success_msg', 'Successfully Updated User.');
            return redirect('users');
        } else {
            Session::flash('error_msg', 'Only Admin can update user account.');
            return redirect('users');
        }
    }

    public function destroy(User $user)
    {
        if (Auth::user()->role != 'admin') {
            Session::flash('error_msg', 'Only Admin can delete user account.');
            return redirect('users');
        } else {
            //deleted user
            $user_id = Auth::id();
            $message = 'Deleted user ' . $user->email;
            Activity::saveActivity($user_id, $message);

            // deleted all activity according to this user
            Activity::where('user_id', $user->id)->delete();

            $user->delete();

            Session::flash('success_msg', 'Successfully Deleted User.');
            return redirect('users');
        }
    }

    public function change_status($user_id)
    {
        if (Auth::user()->role != 'admin') {
            Session::flash('error_msg', 'Only Admin can change user status.');
            return redirect('users');
        } else {
            // get user by user_id
            $user = User::find($user_id);

            if ($user->status == 'Active') {// check user status (Active, Banned) and set
                $user->status = 'Banned';
            } else if ($user->status == 'Banned') {
                $user->status = 'Active';
            }
            $user->save();
            $message = $user->status . ' user ' . $user->email;
            Activity::saveActivity(Auth::id(), $message);
            return redirect('users');
        }
    }

    public function active_users() // get all active user
    {
        $title = trans('common.add') . ' ' . trans('common.user');
        $pageName = trans('common.all') . ' ' . trans('common.users');
        // only active users
        $allUsers = User::where('status', 'Active')->get();
        return view('users.home', get_defined_vars());
    }

    public function banned_users() // get all banned user
    {
        $title = trans('common.add') . ' ' . trans('common.user');
        $pageName = trans('common.all') . ' ' . trans('common.users');
        //only banned users
        $allUsers = User::where('status', 'Banned')->get();
        return view('users.home', get_defined_vars());
    }

    // this method is for updating user password
    public function update_password(Request $request)
    {
        if ($request->method() == 'POST') {
            $rules = array(
                'previous_password' => 'required|min:6',
                'new_password' => 'required|min:6',
                'retype_password' => 'required|same:new_password'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect('users/update_password')
                    ->withErrors($validator);
            } else {
                if (Auth::attempt(array('email' => Auth::user()->email, 'password' => $request->input('previous_password')), true)) {
                    $user = User::find(Auth::id());
                    $user->password = Hash::make($request->input('new_password'));
                    $user->save();
                    Session::flash('success_msg', 'Your password successfully updated');
                    return Redirect('/');
                } else {
                    Session::flash('error_msg', 'Your password Missmatched');
                    return Redirect('users/update_password');
                }
            }
        }
        return view('users.update_password');
    }
}
