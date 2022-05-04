<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class StudentController extends Controller
{
    //
    public function studentList()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/student_list', ['verify' => false]);
        // dd($request->json());
        $studentList = ($request->json());
        if ($studentList['status'] == '200') {
            $studentList = $studentList['data'];
            //dd($studentList);
            //Session::flush();
            return view('student.student-list', compact('studentList'));
        }
    }

    public function registerStudent()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
         //dd($request->json());
        $courseList = ($request->json());
        $courseList = $courseList['data'];
        return view('student.register-student',compact('courseList'));
    }



    public function registeration(Request $request)
    {
          //dd($request->all());
        $request->validate([
            'firstName' => 'required',
            //'lastName' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phoneNumber' => 'required',
            'city' => 'required'
        ],
        [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $phoneNumber = $request->phoneNumber;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        $city = $request->city;
        foreach($request->courseId as $course){
            $courses[] = array('courseId' => $course);
         }

         foreach($request->levelId as $level){
            $levels[] = array('levelId' => $level);
         }

         $length = count($courses);
             for ($i = 0; $i < $length; $i++) {
            // print $courses[$i]['courseId'];
             $courses[$i]['levelId'] = $levels[$i]['levelId'];
        }

        // dd($courses);
        $response = Http::post(
            'http://173.212.217.22:5050/api/admin/student_register',
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'phoneNumber' => $phoneNumber,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'city' => $city,
                'Courses' => $courses,
                //'Levels' => $levels,
            ]
        );
        //dd($response->body());
        //echo $response['message'];die;
        //return response($response->body());

        if ($response['status'] == '200') {
            return redirect()->route('student-list')->with('success', 'Student Registered successfully !');
        } else {
            return redirect()->route('student-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }



    public function editStudent($id)
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/student_Details/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $studentDetail = ($request->json());
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
        //dd($request->json());
       $courseList = ($request->json());
       $courseList = $courseList['data'];
        //dd($studentDetail);
        if ($studentDetail['status'] == '200') {
            $studentDetail = $studentDetail['data'];
            //dd($studentDetail);
            return view('student.edit-student', compact('studentDetail','courseList'));
        }
    }

    public function studentDelete(Request $request)
    {
      //dd($request->all());

            foreach($request->list as $list){
                $lists[] = array('studentId' => $list);
             }
          //dd($lists);
       $response = Http::post('http://173.212.217.22:5050/api/admin/multipleStudentDelete',
            [
              'Students' => $lists,
            ]
        );
        //dd($response->json());
        if ($response['status'] == '200') {
            return redirect()->route('student-list')->with('success', $response['message']);
        } else {
            return redirect()->route('student-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function updateStudent(Request $request, $id)
    {
        //dd($request->all());
        $courses =[];
        $levels = [];
        if(isset($request->courseId)){
            foreach($request->courseId as $course){
                $courses[] = array('courseId' => $course);
             }
        }

        if(isset($request->levelId)){
            foreach($request->levelId as $level){
                $levels[] = array('levelId' => $level);
            }
        }

         $length = count($courses);
             for ($i = 0; $i < $length; $i++) {
            // print $courses[$i]['courseId'];
             $courses[$i]['levelId'] = $levels[$i]['levelId'];
        }


        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $phoneNumber = $request->phoneNumber;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        $city = $request->city;

        $response = Http::put(
            'http://173.212.217.22:5050/api/admin/edit_student/' . $id,
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'phoneNumber' => $phoneNumber,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'city' => $city,
                'Courses' => $courses,
            ]
        );

        if ($response['status'] == '200') {
            return redirect()->route('student-list')->with('success', 'Student Updated successfully !');
        } else {
            return redirect()->route('student-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }
}
