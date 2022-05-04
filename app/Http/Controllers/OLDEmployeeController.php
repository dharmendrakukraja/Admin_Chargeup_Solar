<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{



    // public function __construct() {
    //   //  $this->middleware('auth');
    // }

    public function registration()
    {
        return view('registration');
    }


    public function store(Request $request)
    {   //echo '<pre>';die;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'empId' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
            'date_of_birth' => 'required',
            'date_of_join' => 'required',
            'phone' => 'required|min:10',
            'emergency_phone' => 'required|min:10',
            'relation' => 'required',
            'pan' => 'required|min:10',
            'aadhar_no' => 'required|min:10',
            'education' => 'required',
            'experience' => 'required',
            'report_to' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'address' => 'required',
        ],
         [
            'first_name.required' => 'First name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',

        ]);

        $data = $request->all();
        //echo '<pre>';print_r($data);die;
        // if ($request->hasFile('image')) {
        //             $path = Storage::disk('local')->put($request->file('image')->getClientOriginalName(),$request->file('image')->get());
        //                 //$path = $request->file('photo')->store('/images/1/smalls');
        //                 echo $path;die;
        //             } //https://stackoverflow.com/questions/41990023/how-to-save-uploaded-image-to-storage-in-laravel
        // Image Upload
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('profile_images'), $imageName);
        $user= User::create([
            'name' => $data['first_name'].' '.$data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $imageName,
          ]);

          $lastInsertedId= $user->id;

          //$data['date_of_birth'] = Carbon::parse($data['date_of_birth'])->format('Y-m-d');

          $date_of_birth = strtr($data['date_of_birth'], '/', '-');
          $date_of_birth  = date('Y-m-d',strtotime($date_of_birth));
          $date_of_join = strtr($data['date_of_join'], '/', '-');
          $date_of_join = date('Y-m-d',strtotime($date_of_join));
          Employee::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'emp_id' => $data['empId'],
            'department' => $data['department'],
            'designation' => $data['designation'],
            'address' => $data['address'],
            'date_of_birth' => $date_of_birth,
            'date_of_join' => $date_of_join,
            'blood_group' => $data['blood_group'],

            'father_name' => $data['father_name'],
            'mother_name' => $data['mother_name'],
            'technologies' => $data['technologies'],
            'current_project' => $data['current_project'],

            'emergency_contact_no' => $data['emergency_phone'],
            'relation' => $data['relation'],
            'pan' => $data['pan'],
            'aadhar_no' => $data['aadhar_no'],
            'passport_no' => $data['passport_no'],
            'education' => $data['education'],
            'experience' => $data['experience'],
            'report_to' => $data['report_to'],
            'user_id' => $lastInsertedId,
          ]);


        //return redirect("employees-list")->withSuccess('New Employee Added Successfully !');
        return redirect("employees-list")->with('message',"New Employee Added Successfully !");
    }

    public function update(Request $request, $id)
    {      //echo 'UPDAE';echo $id;die;
        //Validation for required fields (and using some regex to validate our numeric value)
        //echo $request->first_name;
        //dd($request->all());die;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'empId' => 'required',
            //'email' => 'required|email|unique:users,email_address,'.$request->email,

            'date_of_birth' => 'required',
            'date_of_join' => 'required',
            'phone' => 'required|min:10',
            'emergency_phone' => 'required|min:10',
            'relation' => 'required',
            'pan' => 'required|min:10',
            'aadhar_no' => 'required|min:10',
            'education' => 'required',
            'experience' => 'required',
            'report_to' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'address' => 'required',
        ],
         [
            'first_name.required' => 'First name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',

        ]);

        $data = $request->all();
        //echo '<pre>';print_r($data);die;

        // $result = DB::select("Select * from employees INNER JOIN users
        // ON users.id = employees.user_id WHERE employees.user_id = '" . $id . "' ");
        // $res = $result[0];
       // echo '<pre>';print_r($res);echo $res->user_id; die;

       $user = User::where('id', '=', $data['user_id'])->firstOrFail();

       if ($request->hasFile('image')) {
           $imageName = time().'.'.$request->image->extension();
           $request->image->move(public_path('profile_images'), $imageName);
           $user->name =   $data['first_name'].' '.$data['last_name'];
           $user->email = $data['email'];
           $user->image = $imageName;
           $user->save();
       }else{
           $user->name =   $data['first_name'].' '.$data['last_name'];
           $user->email = $data['email'];
           $user->save();
      }
        //echo '<pre>';print_r($user);
        //echo $user->name;
        //die;

         // Getting values from the blade template form

        $employee = Employee::where('id', '=', $data['employee_id'])->firstOrFail();
        //echo '<pre>';print_r($employee);die;
        //echo $employee->first_name;
        //die;
        // Date Conversion
        $date_of_birth = strtr($data['date_of_birth'], '/', '-');
        $date_of_birth  = date('Y-m-d',strtotime($date_of_birth));
        $date_of_join = strtr($data['date_of_join'], '/', '-');
        $date_of_join = date('Y-m-d',strtotime($date_of_join));
         // Getting values from the blade template form
        $employee->first_name =   $data['first_name'];
        $employee->last_name  = $data['last_name'];
        $employee->phone = $data['phone'];
        $employee->emp_id = $data['empId'];
        $employee->department  = $data['department'];
        $employee->designation = $data['designation'];
        $employee->address = $data['address'];
        $employee->date_of_birth =  $date_of_birth;
        $employee->date_of_join = $date_of_join;
        $employee->blood_group  = $data['blood_group'];
        $employee->emergency_contact_no = $data['emergency_phone'];
        $employee->relation  =   $data['relation'];
        $employee->pan  = $data['pan'];
        $employee->aadhar_no  = $data['aadhar_no'];
        $employee->passport_no = $data['passport_no'];
        $employee->education = $data['education'];
        $employee->experience  = $data['experience'];
        $employee->report_to = $data['report_to'];

        $employee->father_name = $data['father_name'];
        $employee->mother_name = $data['mother_name'];
        $employee->technologies = $data['technologies'];
        $employee->current_project = $data['current_project'];
        $employee->status = $data['status'];

        $employee->save();
        return redirect('/employees-list')->with('success', 'Employee Details Updated Successfully !'); // -> resources/views/stocks/index.blade.php
    }


    public function edit($id)
    {
        if (Auth::check()){
        $result = DB::select("Select *,employees.id as eid,users.id as user_id from employees INNER JOIN users
        ON users.id = employees.user_id  WHERE employees.user_id = '" . $id . "' ");
        $birth_date = date('d/m/Y', strtotime($result[0]->date_of_birth));
        $result[0]->date_of_birth = $birth_date;
        $join_date = date('d/m/Y', strtotime($result[0]->date_of_join));
        $result[0]->date_of_join = $join_date;
        //echo '<pre>';print_r($result[0]);die;
        return view('edit-employees')->with('result',$result[0]);
        }

        return redirect('login');
    }


    public function profile(Request $request, $id)
    {
           if($id == Auth::User()->id){

           }else{

           }

           if($request->user()->role != 'admin'){
                   echo 'NO-ADMIN';
           }else{
                  echo 'ADMIN';
           }die;
          if( $request->route('id') != $request->user()->id ){

            abort(403, 'Access denied');

          }else{
              echo 'IN';die;
          }
        //echo $request->route('id'); echo $request->user()->id;  die;
        $result = DB::select("Select * from employees INNER JOIN users
        ON users.id = employees.user_id  WHERE employees.user_id = '" . $id . "' ");
         //echo '<pre>';print_r($result[0]);die;
        return view('profile')->with('result',$result[0]);
    }

    public function inactive(Request $request)
    {
         //dd($request->all());
         $id = $request->input('id');
         DB::table('employees')
           ->where('id',$id)
           ->update(['status'=>'inactive']);
          die;
        //    return view('employees-list')->withSuccess('You are not allowed to access');
            return redirect()->route('employees-list')->with('message',"Employee Inactive Successfully !");
          // return redirect()->back()->with('message',"Employee Inactive Successfully !");

    }

    public function index(){
        if (Auth::check()){
        $result = DB::select("Select *,employees.id as eid from employees INNER JOIN users
        ON users.id = employees.user_id  ");
        //echo '<pre>';print_r($result);die;where employees.status='inactive'
        return view('employees-list')->with('result',$result);
        }
        return redirect('login');
     }


    public function dashboard()
    {
        if(Auth::check()){
            return view('index');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
