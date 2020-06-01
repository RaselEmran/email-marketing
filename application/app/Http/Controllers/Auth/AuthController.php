<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Activity\Activity;
use Laravel\Socialite\Facades\Socialite;
use Session; 

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // check install == 1 into .env
        // if exist install success else redirect to install
        $this->middleware('install');
        // check guest user if is a guest hide logout
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $insertedData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => $data['status']
        ];

        if (isset($data['role'])) {
            $insertedData['role'] = $data['role'];
        }

        return User::create($insertedData);
    }

    public function redirectToProvider(Request $request)
    {
        // get social login platform from url
        $platform = $request->segment(1);
        // set it uppoercase
        $upperPlat = strtoupper($platform);

        // checked social login credentials according to $platform.
        // if this not exist redirect to login without social platform
        if ((!env($upperPlat . "_CLIENT_ID", false)) && (!env($upperPlat . '_CLIENT_SECRET', false)) && (!env($platform . '_GITHUB_REDIRECT', false))) {
            Session::flash('login_error_msg', 'If you are admin please visit ' . url('oauth') . ' and configure with social credentials.');
            return redirect()->back();
        }
        // if exist redirect to social platform login
        return Socialite::driver($platform)->redirect();
    }

    // this function used to callback from social login and check it
    public function handleProviderCallback(Request $request)
    {
        // if not get any error, get user information with login platform
        if (!$request->error && !$request->denied) {
            $platform = $request->segment(1);
            // get all information of logged in user
            $socialize_user = Socialite::driver($platform)->user();
            $oauth_user_id = $socialize_user->getId();
            $oauth_user = User::where('platform', $platform)
                ->where('oauth_user_id', $oauth_user_id)
                ->first();

            // if no user get option to registration
            // else login
            if (!$oauth_user) { // get all information of user after login
                $data = [];
                $oauth_user = new User();
                $data['name'] = $socialize_user->getName();

                if (!$data['name']) {
                    $data['name'] = $socialize_user->getNickName();
                }
                $user_email = ($socialize_user->getEmail()) ? $socialize_user->getEmail() : '';
                // check validation rule
                $rules = array(
                    'name' => 'required',
                );
                $validator = Validator::make($data, $rules);
                if ($validator->fails()) {
                    return redirect('/login')
                        ->withErrors($validator);
                }
                // save all information of this user into  users  table
                $oauth_user->name = $data['name'];
                $oauth_user->email = $user_email;
                $oauth_user->photo = $socialize_user->getAvatar();
                $oauth_user->status = 'Active';
                $oauth_user->platform = $platform;
                $oauth_user->oauth_user_id = $oauth_user_id;
                $oauth_user->save();
            }

            if ($oauth_user->status == 'Banned') {
                Session::flash('login_error_msg', 'You are banned now.');
                return redirect('/login');
            }
            // login
            Auth::loginUsingId($oauth_user->id);

            $user_id = Auth::id();
            $message = 'Logged in.';
            // save information  into activity table
            Activity::saveActivity($user_id, $message);

        }
        return redirect('/');
    }

    // overload postLogin for activities
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // checked banned user if true redirect to login with message
            if (Auth::user()->status == 'Banned') {
                Auth::logout();
                Session::flash('login_error_msg', trans('common.banned_msg'));
                return redirect('/login');
            }

            $user_id = Auth::id();
            $message = 'Logged in.';
            // save information  into activity table
            Activity::saveActivity($user_id, $message);

            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $allRequest = $request->all();
        $allRequest['status'] = 'Active';

        // for admin account
        $usersCount = User::count();
        if ($usersCount == 0) {
            $allRequest['role'] = 'admin';
        }

        //save into database ,auto login
        Auth::login($this->create($allRequest));

        $user_id = Auth::id();
        $message = 'Logged in.';
        // save information  into activity table
        Activity::saveActivity($user_id, $message);

        return redirect($this->redirectPath());
    }

    public function getLogout()
    {
        $user_id = Auth::id();
        $message = 'Logged out.';
        // save information  into activity table
        Activity::saveActivity($user_id, $message);

        //logout
        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $allRequest = $request->all();
        $allRequest['status'] = 'Active';

        // for admin account
        $usersCount = User::count();
        if ($usersCount == 0) {
            $allRequest['role'] = 'admin';
        }

        //save into database ,auto login
        Auth::login($this->create($allRequest));

        $user_id = Auth::id();
        $message = 'Logged in.';
        // save information  into activity table
        Activity::saveActivity($user_id, $message);

//        Auth::guard($this->getGuard())->login($this->create($request->all()));

        return redirect($this->redirectPath());
    }
}
