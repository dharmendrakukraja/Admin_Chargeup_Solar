<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LevelController extends Controller
{
    //
    public function addLevel()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
         //dd($request->json());
        $courseList = ($request->json());
        $courseList = $courseList['data'];
        return view('course-level.add-level',compact('courseList'));
    }

    public function levelAdd(Request $request)
    {
          $request->validate([
            'courseId' => 'required',
            'Level' => 'required',

        ],
        [
            'courseId.required' => 'Course name is required',
            'Level.required' => 'Level is required',
        ]);
        $courseId = $request->courseId;
        $Level = $request->Level;

        //dd($request->all());die;

        $response = Http::post(
            'http://173.212.217.22:5050/api/admin/add_level',
            [
                'courseId' => $courseId,
                'Level' => $Level,
            ]
        );
        //dd($response->body());
        //echo $response['message'];die;
        //return response($response->body());

        if ($response['status'] == '200') {
            return redirect()->route('level-list')->with('success', 'Level Added successfully !');
        } else {
            return redirect()->route('add-level')->with('error', 'There is some error ' . $response['message']);

        }
    }

    public function levelList()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/levelList', ['verify' => false]);
        // dd($request->json());
        $levelList = ($request->json());
        if ($levelList['status'] == '200') {
            $levelList = $levelList['data'];
            //$levelId = $levelList['levelId']['_id'];
            //dd($levelList);
            return view('course-level.level-list', compact('levelList'));
        }
    }

    public function levelDelete(Request $request)
    {
      //dd($request->all());

            foreach($request->list as $list){
                $lists[] = array('levelId' => $list);
             }
         // dd($lists);
       $response = Http::post('http://173.212.217.22:5050/api/admin/multipleCourseLevelDelete',
            [
              'Levels' => $lists,
            ]
        );

        if ($response['status'] == '200') {
            return redirect()->route('level-list')->with('success', $response['message']);
        } else {
            return redirect()->route('level-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function editLevel($id)
    {
        $request = Http::post('http://173.212.217.22:5050/api/admin/Course_level_Detail/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $levelDetail = ($request->json());
        //dd($studentDetail);
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
        //dd($request->json());
       $courseList = ($request->json());
       $courseList = $courseList['data'];
        if ($levelDetail['status'] == '200') {
            $levelDetail = $levelDetail['data'];
            //dd($levelDetail);
            return view('course-level.edit-level', compact('levelDetail','courseList'));
        }
    }

    public function updateLevel(Request $request, $id)
    {
        //dd($request->all());
        $courseId = $request->courseId;
        $level = $request->Level;

            //echo 'No-Image';
            $response = Http::put(
                'http://173.212.217.22:5050/api/admin/edit_levelDetail/' . $id,
                [
                    'courseId' => $courseId,
                    'Level' => $level,
                ]
            );

        //dd($response);


        if ($response['status'] == '200') {
            return redirect()->route('level-list')->with('success', 'Course Level Updated successfully !');
        } else {
            return redirect()->route('course-level.edit-course')->with('error', 'There is some server error !' . $response['message']);
        }
    }
}
