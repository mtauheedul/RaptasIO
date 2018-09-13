<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth:admin');
    }
    public function countEmp()
    {
        
       $status ="YES";
       $users  = DB::table('employee')
                    ->where('staus_flag','YES')
                    ->orderBy('checkIN','DESC')
                    ->get();
        $usersOut  = DB::table('employee')
                    ->where('staus_flag','NO')
                    ->orderBy('checkOUT','DESC')
                    ->get();
                       //dd($users); 

        return response()->json([
                                    'user2' => $users,
                                    'user3' => $usersOut 
                               ]);
    }

    public function getEmpList()
    {

        return view('user.createEmployee');
    }

    public function getLog()
    {
        $res  = DB::table('attendance_histories')
                    ->orderBy('id','DESC')
                    ->get();



                    $records = DB::table('employee')
                    ->Join('attendance_histories', 'employee.id', '=', 'attendance_histories.emp_id')
                    ->get();

        
        return view('employee.attendanceLog', compact('records'));
    }


    public function getGraphView()     
    {
        
        return view('employee.graphs');
    }


    public function updateEmpView()     
    {
        $records = DB::table('employee')
            
            ->get();
        return view('employee.updateEmployee',compact('records'));
    }


    public function updateEmp(Request $request)     
    {
        

                    DB::table('employee')
                                ->where('id',$request->input('empID'))
                                ->update(['name'=> $request->input('username'),'email'=> $request->input('email'),'designation'=> $request->input('designation'),'password'=> $request->input('password')]);

                    $records = DB::table('employee')
                        
                        ->get();
          

        return view('employee.updateEmployee',compact('records'));
            

    }


    public function destroy(Request $request)
    {
       DB::table('employee')->where('id', $request->input('id'))->delete();

                            $records = DB::table('employee')
                                                    ->get();
         
        return view('employee.updateEmployee',compact('records'));
       
       
    }


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
        ->insert(['user_id' =>$request->id ,'name' =>$request->input('name') ,'phone' =>$phone,'staus_flag' => 'NO','designation' => $designation,'email' =>$email,'password' =>$pass]);
       
        $getEmpID = DB::table('employee')
                    ->select('id')
                        ->where('email',$email)
                        ->pluck('id');

        //  DB::table('passHistory')
        // ->insert(['emp_id' =>$getEmpID[0] ,'previous_password' =>Hash::make($pass)]);
        return redirect('admin/home');
           //return response($request->all());
    }

public function getLeaveView()
    {
        $records = DB::table('employee')
            
            ->get();
        return view('admin.leave',compact('records'));
    }
    public function searchView()
    {
        $records = DB::table('employee')
            
            ->get();
        return view('employee.attendanceStatus',compact('records'));
    }

    public function WorkHourView()
    {
        $records = DB::table('work_hour')
                    ->get();
        return view('admin.workingHour',compact('records'));
    }
    public function SetWorkHour(Request $request)
    {
        $starts =$request->input('starts');
        $ends =$request->input('ends');
        $minimum =$request->input('minimum');
        $status =$request->input('status');
        
        DB::table('work_hour')
        ->insert(['starts' => $starts ,'ends' =>$ends ,'minimum' =>$minimum,'status' =>$status]);

        $users = 'YES';

        return response()->json([
                                  'user2' => $users
                                  
                                ]);

    }
    public function DeleteState(Request $request)
    {
        $id =$request->input('id');
       DB::table('work_hour')->where('id', $id)->delete();

                            
        $users = 'DELETED';

        return response()->json([
                                  'user2' => $users
                                  
                                ]);
         
        
       
       
    }
    public function calculateAtt(Request $request)
    {
        $starts =$request->input('starts');
        $ends =$request->input('ends');
        $id =$request->input('id');

        $resultName = DB::table('employee')
                    ->select('name')
                    ->where('id', '=', $id)->get();

        $resultCheckIN = DB::table('employee')
                    ->select('checkIN')
                    ->where('id', '=', $id)->get();

        $resultCheckOUT = DB::table('employee')
                    ->select('checkOUT')
                    ->where('id', '=', $id)->get();

        $resultStatus = DB::table('employee')
                    ->select('staus_flag')
                    ->where('id', '=', $id)->get();

        $users = 'DELETED';

       // dd($resultName,$resultCheckIN,$resultCheckOUT,$resultStatus);

        return response()->json([
                                  'name' => $resultName,
                                  'checkIN' => $resultCheckIN,
                                  'checkOUT' => $resultCheckOUT,
                                  'status' => $resultStatus

                                  
                                ]);
       
    }

    public function getHoliday()
    {
        return view('admin.holiday');
    }
    public function SetActive(Request $request)
    {
        $id =$request->input('id');
        
        
         DB::table('work_hour')
        ->where('id',$id)
        ->update(['status'=> 'active']);

        $users = 'YES';

        return response()->json([
                                  'user2' => $users
                                  
                                ]);

    }
    public function SetDeActive(Request $request)
    {
        $id =$request->input('id');
        
        
         DB::table('work_hour')
        ->where('id',$id)
        ->update(['status'=> 'inactive']);

        $users = 'NO';

        return response()->json([
                                  'user2' => $users
                                  
                                ]);

    }

    public function checkStatusEmp(Request $request)
    {
        
        $pass =$request->input('pass');
        //dd($pass);
        //dd('asd');
        // $pass =$request->very1;
        //dd($pass);
        $checkIN = now();

        $checkPass = DB::table('employee')
                    ->select('password')
                    ->where('password', '=', $pass)->get();

        
                 

        $getEmpID = DB::table('employee')
                        ->select('id')
                        ->where('password',$pass)
                        ->pluck('id');

        $checkStatus = DB::table('employee')
                        ->select('staus_flag')
                        ->where('id',$getEmpID[0])
                        ->pluck('staus_flag');

                        //dd($checkStatus[0]);
                        //dd($checkPass);
                        //dd($checkPass,$getEmpID,$checkStatus);
                        //dd(($checkPass && ($checkStatus=="NO")));

                        if(isset($checkPass))
                        {
                            
                                    if($checkStatus[0]=='NO')
                                    {
                                        $users ='in';
                                        $getEmpName = DB::table('employee')
                                                    ->select('name')
                                                    ->where('password',$pass)
                                                    ->pluck('name');
                                        $username =$getEmpName[0];

                                        return response()->json([
                                                                        'user2' => $users,
                                                                        'user3' => $username 
                                                                ]);
                                    }
                                    if($checkStatus[0]=='YES')
                                    {
                                        $users ='out';
                                        $getEmpName = DB::table('employee')
                                                    ->select('name')
                                                    ->where('password',$pass)
                                                    ->pluck('name');
                                        $username =$getEmpName[0];
                                        return response()->json([
                                                                        'user2' => $users,
                                                                        'user3' => $username 
                                                                ]);
                                    }
                            
                            
                        }
                        else
                        {
                            $users ='passout';

                            return response()->json([
                                                        'user2' => $users 
                                                    ]);
                        }
       
    }

    public function attendanceIN(Request $request)
    {
        $pass =$request->input('pass');
        $checkIN = now();


        $checkPass = DB::table('employee')
                    ->select('password')
                    ->where('password', '=', $pass)->get();

        // $checkPass = DB::table('employee')
        //             ->select('password')
        //                 ->where('password',$pass)
        //                 ->pluck('password');

        $getEmpID = DB::table('employee')
                    ->select('id')
                        ->where('password',$pass)
                        ->pluck('id');

        $checkStatus = DB::table('employee')
                    ->select('staus_flag')
                        ->where('id',$getEmpID[0])
                        ->pluck('staus_flag');

                        //dd($checkPass,$getEmpID,$checkStatus);
                        //dd(($checkPass && ($checkStatus=="NO")));

                        if(isset($checkPass))
                        {
                            if($checkStatus[0]=='NO')
                            {
                                DB::table('employee')
                                ->where('password',$pass)
                                ->update(['checkIN'=> $checkIN]);

                            DB::table('employee')
                                ->where('password',$pass)
                                ->update(['staus_flag'=> 'YES']);
                            
                            DB::table('attendance_histories')
                                ->insert(['emp_id' =>$getEmpID[0] ,'checkIN' =>$checkIN]);

                            $users ='OKIN';

                            return response()->json([
                                                        'user2' => $users 
                                                    ]);
                            }
                            // else
                            // {
                            //     return 'You Have Already Checked IN Today';
                            // }
                            
                            }
                        // else
                        // {
                        //     return 'Password Incorrect Please Enter Correctly';
                        // }
       
    }
    public function attendanceOUT(Request $request)
    {
          $pass =$request->input('pass');
          $checkOUT = now();


          $checkPass = DB::table('employee')
                    ->select('password')
                    ->where('password', '=', $pass)->get();

        // $checkPass = DB::table('employee')
        //             ->select('password')
        //                 ->where('password',$pass)
        //                 ->pluck('password');

        $getEmpID = DB::table('employee')
                    ->select('id')
                        ->where('password',$pass)
                        ->pluck('id');
                         $checkStatus = DB::table('employee')
                    ->select('staus_flag')
                        ->where('id',$getEmpID[0])
                        ->pluck('staus_flag');

                        if(isset($checkPass))
                        {
                            if($checkStatus[0]=='YES')
                            {
                                    DB::table('employee')
                                    ->where('password',$pass)
                                    ->update(['checkOUT'=> $checkOUT]);

                                    DB::table('employee')
                                    ->where('password',$pass)
                                    ->update(['staus_flag'=> 'NO']);

                                     DB::table('attendance_histories')
                                ->insert(['emp_id' =>$getEmpID[0] ,'checkOUT' =>$checkOUT]);
                       
                          $users ='OKOUT';

                            return response()->json([
                                                        'user2' => $users 
                                                    ]);
                          }
                          // else
                          // {
                          //   return 'You Have Already Cheked OUT Today';
                          // } 
                        }
                        // else
                        // {
                        //     return 'Password Incorrect Please Enter Correct Password';
                        // }
                        
       
    }
    public function attendanceView(Request $request)
    {
       // return view('employee.attendance');
        return view('layouts.clock');
       
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $records = DB::table('employee')
                    ->get();
           

        return view('admin.home',compact('records'));
        //return view('admin.home');
    }


    public function getPsView()
    {
        return view('admin.newPass');
    }


    public function storePass(Request $request)
    {
        $id = $request->id;
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $re_password = $request->re_password;
        $flag=0;
        //$grabMake = Hash::make($current_password);


        

         $checkPass = DB::table('admins')
                    ->select('password')
                        ->where('id',$id)
                        ->pluck('password');
                        //dd($checkPass);

                        
                            //dd(Hash::check($current_password, $checkPass[0]));
                            //dd(Hash::check($checkPass),$current_password);
    
                                
                        
                        if(Hash::check($current_password, $checkPass[0]))
                        {
                            
                            if($new_password == $re_password)
                            {
                                $checkPrevPass = DB::table('passHistory')
                                                    ->select('previous_password')
                                                    ->where('user_id',$id)
                                                    ->pluck('previous_password');
                                    
                                    for ($i=0; $i < count($checkPrevPass); $i++)
                                    {
                                        if(Hash::check($new_password, $checkPrevPass[$i]))
                                            {
                                                $flag=1;
                                            }
                                    }
                                    if($flag==1)
                                    {
                                        $flag=0;
                                        return view('admin.newPass', ['getid' => [$id]]);

                                    }
                                    else
                                    {            DB::table('passHistory')
                                                ->where('user_id',$id)
                                                ->update(['previous_password'=> Hash::make($new_password)]);
                                                 
                                                 DB::table('admins')
                                                ->where('id',$id)
                                                ->update(['password'=> Hash::make($new_password)]);

                                                DB::table('admins')
                                                ->where('id',$id)
                                                ->update(['last_pass_change_date'=> now()]);

                                                 DB::table('passHistory')
                                                ->insert(['user_id' =>$id ,'previous_password' =>Hash::make($new_password)]);
                                                return redirect('admin/home');
                                        
                                    }

                            }
                            else
                            {
                               
                                return view('admin.newPass', ['getid' => [$id]]);
                            }

                            
                        }
                        else
                        {    
                                        
                            return view('admin.newPass', ['getid' => [$id]]);
                        }


    }

    public function login(Request $request)
    {
        
                        
                        $this->validateLogin($request);

                        if ($this->hasTooManyLoginAttempts($request)) {
                            $this->fireLockoutEvent($request);

                            return $this->sendLockoutResponse($request);
                        }

                        if ($this->attemptLogin($request)) {
                            return $this->sendLoginResponse($request);
                        }

                        $this->incrementLoginAttempts($request);

                        return $this->sendFailedLoginResponse($request); 
                        
    }

}
