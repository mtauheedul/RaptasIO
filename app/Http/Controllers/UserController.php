<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $records = DB::table('employee')
                ->get();
           

        return view('user.dashboard',compact('records'));
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
     public function expiery()
    {
        return view('newPass');
    }

     public function reNewPass(Request $request)
    {
        $current_pass = $request->current_password;
        $new_pass = $request->new_password;
        $re_pass =$request->re_password;
        $email =$request->stored_email;
        
        $checkPass = DB::table('users')
                    ->select('password')
                        ->where('password',$current_pass)
                        ->pluck('password');

                        $getuserID = DB::table('users')
                            ->select('id')
                            ->where('email',$email)
                            ->pluck('id');
                        if($checkPass)
                        {
                            if($new_pass == $re_pass)
                            {
                                $checkPassHistory = DB::table('passHistory')
                                    ->select('previous_password')
                                    ->where('user_id',$getuserID[0])
                                    ->pluck('previous_password');
                                    if(!in_array(md5($new_pass),$checkPassHistory))
                                    {
                                       DB::table('passHistory')
                                            ->where('password',$pass)
                                            ->update(['checkIN'=> $checkIN]);
                                            
                                    }
                            }
                            
                        }
       // return view('newPass');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
