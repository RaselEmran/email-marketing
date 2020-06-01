<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\Request;
use App\User;
use Log;

class UsersRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = User::find($this->segment(2));
        if ($user) {
            if ($user->email == $this->email) {
                return [
                    'name' => 'required',
                ];
            } else {
                return [
                    'name' => 'required',
                    'email' => 'required|email|max:255|unique:users',
                ];
            }
        }
        return [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required'
        ];
    }
}
