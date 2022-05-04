<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CourseController extends Controller
{
    //
    public function courseList()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list', ['verify' => false]);
        // dd($request->json());
        $courseList = ($request->json());
        if ($courseList['status'] == '200') {
            $courseList = $courseList['data'];
            //dd($studentList);
            return view('course.course-list', compact('courseList'));
        }
    }

    public function addCourse()
    {
        return view('course.add-course');
    }

    public function courseAdd(Request $request)
    {
          $request->validate([
            'courseName' => 'required',
            'description' => 'required',
            //'Course_Image' => 'required'

        ],
        [
            'courseName.required' => 'Course name is required',
            'description.required' => 'Description is required',
        ]);
        $courseName = $request->courseName;
        $description = $request->description;
        $Course_Image = $request->Course_Image;
        if(isset($Course_Image)){
            $image = fopen($Course_Image, 'r');
           // dd($request->all());die;
           $response = Http::attach(
            'Course_Image', $image, 'photo.jpg'
           )->post(
            'http://173.212.217.22:5050/api/admin/add_course',
            [
                'courseName' => $courseName,
                'description' => $description,
            ]
           );
        }else{
            $response = Http::post(
                'http://173.212.217.22:5050/api/admin/add_course',
                [
                    'courseName' => $courseName,
                    'description' => $description,
                ]
               );
        }

        //dd($response->body());
        //echo $response['message'];die;
        //return response($response->body());

        if ($response['status'] == '200') {
            return redirect()->route('course-list')->with('success', 'Course Added successfully !');
        } else {
            return redirect()->route('course-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function editCourse($id)
    {
        $request = Http::post('http://173.212.217.22:5050/api/admin/course_detail/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $courseDetail = ($request->json());
        //dd($studentDetail);
        if ($courseDetail['status'] == '200') {
            $courseDetail = $courseDetail['data'];
            //dd($studentList);
            return view('course.edit-course', compact('courseDetail'));
        }
    }

    public function courseDelete(Request $request)
    {
      //dd($request->all());

            foreach($request->list as $list){
                $lists[] = array('courseId' => $list);
             }
          //dd($lists);
       $response = Http::post('http://173.212.217.22:5050/api/admin/multipleCourseDelete',
            [
              'Courses' => $lists,
            ]
        );
        //dd($response->json());
        if ($response['status'] == '200') {
            return redirect()->route('course-list')->with('success', $response['message']);
        } else {
            return redirect()->route('course-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function updateCourse(Request $request, $id)
    {
        $courseName = $request->courseName;
        $description = $request->description;
        $Course_Image = $request->Course_Image;

    // dd($request->all());die;
    if(isset($Course_Image)){
        $image = fopen($Course_Image, 'r');
        $response = Http::attach(
            'Course_Image', $image, 'photo.jpg'
        )->put(
            'http://173.212.217.22:5050/api/admin/update_course/'.$id,[
                "courseName" => $courseName,
                "description" => $description
            ]);
        }else{
            $response = Http::put(
                'http://173.212.217.22:5050/api/admin/update_course/'.$id,[
                    "courseName" => $courseName,
                    "description" => $description
                ]);
        }
        //dd($response);
        if ($response['status'] == '200') {
            return redirect()->route('course-list')->with('success', 'Course Updated successfully !');
        } else {
            return redirect()->route('course-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }
}
