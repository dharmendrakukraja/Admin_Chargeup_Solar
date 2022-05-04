<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AssignmentController extends Controller
{
    //
    public function assignmentList()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/assignment_list', ['verify' => false]);
        // dd($request->json());
        $assignmentList = ($request->json());
        if ($assignmentList['status'] == '200') {
            $assignmentList = $assignmentList['data'];
            //dd($assignmentList);
            return view('assignment.assignment-list', compact('assignmentList'));
        }
    }

    public function courseList($id)
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/courseLevel_Detail/' . $id, ['verify' => false]);
        // dd($request->json());
        $courseList = ($request->json());
        if ($courseList['status'] == '200') {
            $courseList = $courseList['data'];
        return $courseList['Level'];
           // return view('assignment.assignment-list', compact('assignmentList'));
        }
    }

    public function addAssignment()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
         //dd($request->json());
        $courseList = ($request->json());
        $courseList = $courseList['data'];
        return view('assignment.add-assignment',compact('courseList'));
    }

    public function assignAdd(Request $request)
    {
        //   $request->validate([
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        //     'phoneNumber' => 'required',
        //     'address' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'phoneNumber' => 'required',
        //     'city' => 'required'

        // ],
        // [
        //     'email.required' => 'Email is required',
        //     'password.required' => 'Password is required',
        // ]);
        //dd($request->all());
        $assignmentName = $request->assignmentName;
        $description = $request->description;
        $courseId = $request->courseId;
        $levelId = $request->levelId;
        $submission_date = $request->submission_date;
        $assignment_id = $request->assignment_id;

            foreach($request->student as $student){
                $students[] = array('studentId' => $student);
             }
            //$json = json_encode($students);
            //$json1 = json_decode($json);
            //$json = stripslashes($json);
            //$json = str_replace("\ " ,'',$json);
        //dd($json);
        //$student = $json;
        //dd($student);
        //dd($request->student);
        //die;
        $submission_date = date('d-m-Y', strtotime($submission_date));
        //echo $submission_date;
        $date = explode(" ",$submission_date);
        $submission_date = $date[0];
        $response = Http::post('http://173.212.217.22:5050/api/admin/assignStudent',
            [
                'assignmentName' => $assignmentName,
                'description' => $description,
                'courseId' => $courseId,
                'levelId' => $levelId,
                'courseId' => $courseId,
                'submission_date' => $submission_date,
                'assignment_id' => $assignment_id,
                'student' => $students,
            ]
        );

        //echo $submission_date;die;
        //echo $response;
        //dd($response->body());
        //echo $response['message'];die;
        //return response($response->body());

        if ($response['status'] == '200') {
            return redirect()->route('assignment-list')->with('success', $response['message']);
        } else {
            return redirect()->route('assignment-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function assignmentAdd(Request $request)
    {

        $request->validate([
            'courseId' => 'required',
            'levelId' => 'required',
            'assignmentName' => 'required',
            'description' => 'required',

        ],
        [
            'courseId.required' => 'Course is required',
            'levelId.required' => 'Level is required',
            'assignmentName.required' => 'Assignement Name is required',
            'description.required' => 'Assignement Description is required',
        ]);
        //dd($request->all());
        $courseId = $request->courseId;
        $levelId = $request->levelId;
        $assignmentName = $request->assignmentName;
        $description = $request->description;
        $type = $request->type;

        //dd($request->all());
        if($type =='Video'){
            $assignmentVideo = $request->assignmentVideo;
            if(isset($assignmentVideo)){
                //echo 'Image';
                $image = fopen($assignmentVideo, 'r');
                $name =  $request->assignmentVideo->getClientOriginalName();

                $response = Http::attach(
                    'assignmentVideo', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }
        }
        if($type =='Image'){
            $assignmentImage = $request->assignmentImage;
            if(isset($assignmentImage)){
                //echo 'Image';
                //dd($request->all());
        $name =$request->assignmentImage->getClientOriginalName();

                $image = fopen($assignmentImage, 'r');

                $response = Http::attach(
                    'assignmentImage', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
                //dd($response->json());
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }
        }
        if($type =='Pdf'){
            //dd($request->all());
            $assignmentPdf  = $request->assignmentPdf;

            if(isset($assignmentPdf)){
                //echo 'Image';
                $name =  $request->assignmentPdf->getClientOriginalName();
                $image = fopen($assignmentPdf, 'r');

                $response = Http::attach(
                    'assignmentPdf', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }
        }
        if($type =='Document'){
            $assignmentDocument = $request->assignmentDocument;
            if(isset($assignmentDocument)){
                //echo 'Image';
                $image = fopen($assignmentDocument, 'r');
                $name =  $request->assignmentDocument->getClientOriginalName();

                $response = Http::attach(
                    'assignmentDocument', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }
        }
        if($type ==''){

        $response = Http::post(
            'http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'],
            [
                'courseId' => $courseId,
                'levelId' => $levelId,
                'assignmentName' => $assignmentName,
                'description' =>$description,
            ]
        );
      }




        // $photo = fopen($assignmentImage, 'r');

        // $response = Http::attach(
        //     'assignmentImage', $photo, 'photo.jpg'
        // )->post('http://173.212.217.22:5050/api/admin/add_assignment/'.Session::get('userData')['_id'] ,
        //     [
        //         'levelId' => $levelId,
        //         'assignmentName' => $assignmentName,
        //         'description' => $description,
        //         'courseId' => $courseId,
        //     ]
        // );
        //echo $response;
        //dd($response->body());
        //echo $response['message'];die;
        //return response($response->body());

        if ($response['status'] == '200') {
            return redirect()->route('assignment-list')->with('success', 'Assignment added successfully !');
        } else {
            return redirect()->route('assignment-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }



    public function editAssignment($id)
    {
        $request = Http::post('http://173.212.217.22:5050/api/admin/assignment_Detail/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $assignmentDetail = ($request->json());
        //dd($studentDetail);
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
        //dd($request->json());
       $courseList = ($request->json());
       $courseList = $courseList['data'];
        if ($assignmentDetail['status'] == '200') {
            $assignmentDetail = $assignmentDetail['data'];
            //dd($assignmentDetail);
            return view('assignment.edit-assignment', compact('assignmentDetail','courseList'));
        }
    }

    public function assignAssignment($id)
    {
        $request = Http::post('http://173.212.217.22:5050/api/admin/assignment_Detail/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $assignmentDetail = ($request->json());
        //dd($studentDetail);
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
        $courseList = ($request->json());
        $courseList = $courseList['data'];

        $student = Http::get('http://173.212.217.22:5050/api/admin/student_list', ['verify' => false]);
        $studentList = ($student->json());
        $studentList = $studentList['data'];
        //dd($request->json());
        if ($assignmentDetail['status'] == '200') {
            $assignmentDetail = $assignmentDetail['data'];
            //dd($assignmentDetail);
            return view('assignment.assign-assignment', compact('assignmentDetail','courseList','studentList'));
        }
    }

    public function assignDetails($id)
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/studentAssignmentDetail/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $assignmentDetail = ($request->json());
        //dd($assignmentDetail);
        $requests = Http::get('http://173.212.217.22:5050/api/admin/student_Details/' . $id, ['verify' => false]);
        //dd($request);
        //dd($requests->json());
        $studentDetail = ($requests->json());
        //dd($studentDetail);
        if ($assignmentDetail['status'] == '200') {
            $assignmentDetail = $assignmentDetail['data'];
            $studentDetail = $studentDetail['data'];
            //dd($assignmentDetail);
            // dd($studentDetail);
            return view('assignment.assignment-details', compact('assignmentDetail','studentDetail'));
        }
    }

    public function assignmentDelete(Request $request)
    {
      //dd($request->all());

            foreach($request->list as $list){
                $lists[] = array('assignmentId' => $list);
             }
          //dd($lists);
       $response = Http::post('http://173.212.217.22:5050/api/admin/multipleAssignmentDelete',
            [
              'Assignments' => $lists,
            ]
        );
        //dd($response->json());
        if ($response['status'] == '200') {
            return redirect()->route('assignment-list')->with('success', $response['message']);
        } else {
            return redirect()->route('assignment-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function updateAssignment(Request $request, $id)
    {
        $levelId = $request->levelId;
        $assignmentName = $request->assignmentName;
        $description = $request->description;
        $courseId = $request->courseId;
        $assignmentImage = $request->assignmentImage;
        $type = $request->type;
        //echo $id;dd($request->all());
        //dd($request->all());
        if($type =='Video'){
            $assignmentVideo = $request->assignmentVideo;
            if(isset($assignmentVideo)){
                //echo 'Image';
                $image = fopen($assignmentVideo, 'r');
                $name =  $request->assignmentVideo->getClientOriginalName();

                $response = Http::attach(
                    'assignmentVideo', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::put(
                    'http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type =='Image'){
            $assignmentImage = $request->assignmentImage;
            if(isset($assignmentImage)){
                //echo 'Image';
                //dd($request->all());
        $name =$request->assignmentImage->getClientOriginalName();

                $image = fopen($assignmentImage, 'r');
                $response = Http::attach(
                    'assignmentImage', $image, $name)->put('http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
                //dd($response->json());
            }else{
                echo 'No-Image';
               //   dd($request->all());
                $response = Http::put('http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        //'type' => $type,
                    ]
                );
               //  dd($response);
            }
        }
        if($type =='Pdf'){
            //dd($request->all());
            $assignmentPdf  = $request->assignmentPdf;

            if(isset($assignmentPdf)){
                //echo 'Image';
                $name =  $request->assignmentPdf->getClientOriginalName();
                $image = fopen($assignmentPdf, 'r');

                $response = Http::attach(
                    'assignmentPdf', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::put(
                    'http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type =='Document'){
            $assignmentDocument = $request->assignmentDocument;
            if(isset($assignmentDocument)){
                //echo 'Image';
                $image = fopen($assignmentDocument, 'r');
                $name =  $request->assignmentDocument->getClientOriginalName();

                $response = Http::attach(
                    'assignmentDocument', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::put(
                    'http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'assignmentName' => $assignmentName,
                        'description' => $description,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type ==''){

        $response = Http::put(
            'http://173.212.217.22:5050/api/admin/update_assignment_Detail/'.$id,
            [
                'courseId' => $courseId,
                'levelId' => $levelId,
                'assignmentName' => $assignmentName,
                'description' =>$description,
            ]
        );
      }

        //dd($response);


        if ($response['status'] == '200') {
            return redirect()->route('assignment-list')->with('success', 'Assignment Updated successfully !');
        } else {
            return redirect()->route('assignment-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

}
