<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
/////////////////////////////////////////////////////////////////////////////////////////////////// Start HERE
    public function login(Request $request)
    {
        $email = $request->email;
            $getAdminId = DB::table('admins')
                    ->select('id')
                        ->where('email',$email)
                        ->pluck('id');
// dd($getAdminId);

         $fromDate = DB::table('admins')
                            ->select('last_pass_change_date')
                            ->where('id',$getAdminId[0])
                            ->pluck('last_pass_change_date');

                            
                            
                        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now());
                        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fromDate[0]);
                        $diff_in_hours = $to->diffInHours($from);
                        $time = $diff_in_hours/24;
                        // dd($from , $to);
                        $upDay = 15-$time;
                        
                        if($upDay<2)
                        {
                             $this->validateLogin($request);

                        
                        if ($this->hasTooManyLoginAttempts($request)) {
                            $this->fireLockoutEvent($request);

                            return $this->sendLockoutResponse($request);
                        }

                        if ($this->attemptLogin($request)) 
                        {
                            $this->sendLoginResponse($request);
                            return view('admin.newPass', ['getid' => [$getAdminId[0]]]);
                            
                        }

                       
                        $this->incrementLoginAttempts($request);

                        return $this->sendFailedLoginResponse($request);

                            //return view('admin.newPass',compact('getAdminId'));
                        }
                        else
                        {
                            //dd('here');
                             $this->validateLogin($request);

                        
                        if ($this->hasTooManyLoginAttempts($request)) {
                            $this->fireLockoutEvent($request);

                            return $this->sendLockoutResponse($request);
                        }

                        if ($this->attemptLogin($request)) 
                        {
                            return $this->sendLoginResponse($request);
                        }

                       
                        $this->incrementLoginAttempts($request);

                        return $this->sendFailedLoginResponse($request); 
                        }
                           
                       
                        
                        
                                   
        
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */

    public function register()
    {
       
     return view('admin.register');
       
    }
     public function StoreRegister(Request $request)
    {
       //dd('yes u rocks');
         //dd('');
        $nowDateTime = now();
        //dd($nowDateTime);
        $expieryDate='15';


        DB::table('admins')
            ->insert(['name' => $request->name,
            'email' => $request->email,
            'pass_creation_date' => $nowDateTime,
            'last_pass_change_date' => $nowDateTime,
            'password' => Hash::make($request->password)]);
       
        $getUserId = DB::table('admins')
                    ->select('id')
                        ->where('email',$request->email)
                        ->pluck('id');
        DB::table('passHistory')
                    ->insert(['user_id' => $getUserId[0],'previous_password' => Hash::make($request->password)]);
        //return $result;
                    //return redirect('admin.login');
                    return $this->sendLoginResponse($request);
    }
           

       //return view('admin.register');
       
    
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////// END HERE

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
