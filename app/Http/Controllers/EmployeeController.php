<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use DB;

class EmployeeController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.createEmployee');
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

public function attendanceIN(Request $request)
    {
        $pass =$request->txtNumber;
        $checkIN = now();

        $checkPass = DB::table('employee')
                    ->select('password')
                        ->where('password',$pass)
                        ->pluck('password');
                        if($checkPass)
                        {
                            DB::table('employee')
                    ->where('password',$pass)
                    ->update(['checkIN'=> $checkIN]);
                        return 'check IN Success :';
                    }
       
    }
    public function attendanceOUT(Request $request)
    {
          $pass =$request->txtNumber;
          $checkOUT = now();

        $checkPass = DB::table('employee')
                    ->select('password')
                        ->where('password',$pass)
                        ->pluck('password');
                        if($checkPass)
                        {
                            DB::table('employee')
                    ->where('password',$pass)
                    ->update(['checkOUT'=> $checkOUT]);
                       
                          return 'check Out Success';  
                        }
                        
       
    }
    public function attendanceView(Request $request)
    {
        return view('employee.attendance');
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storedEmail =$request->stored_email;
        $email =$request->email;
        $name =$request->name;
        $designation =$request->designation;
        $phone =$request->phone;
        $pass =$request->pwd;

        $getUserID = DB::table('users')
                    ->select('id')
                        ->where('email',$storedEmail)
                        ->pluck('id');
         DB::table('employee')
        ->insert(['user_id' =>$getUserID[0] ,'name' =>$request->input('name') ,'phone' =>$phone,'designation' => $designation,'email' =>$email,'password' =>$pass]);
       
        $getEmpID = DB::table('employee')
                    ->select('id')
                        ->where('email',$email)
                        ->pluck('id');

         DB::table('passHistory')
        ->insert(['emp_id' =>$getEmpID[0] ,'previous_password' =>md5($pass)]);
        return redirect('admin/home');
           //return response($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showall(Request $request)
    {
        
    }
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
