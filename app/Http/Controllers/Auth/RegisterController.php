<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/userDashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'type'=> 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $nowDateTime = now();
        //dd($nowDateTime);
        $expieryDate='15';


        
        //'pass_creation_date','last_pass_change_date','days_left','given_days'
        $result= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => $data['type'],
            'pass_creation_date' => $nowDateTime,
            'last_pass_change_date' => $nowDateTime,
            'days_Left' => $expieryDate,
            'given_days' => $expieryDate,
            'password' => Hash::make($data['password']),
        ]);
        $getUserId = DB::table('users')
                    ->select('id')
                        ->where('email',$data['email'])
                        ->pluck('id');
        DB::table('passHistory')
                    ->insert(['user_id' => $getUserId[0],'previous_password' => Hash::make($data['password'])]);
        return $result;
    }
}
