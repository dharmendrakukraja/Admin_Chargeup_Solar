<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideoController extends Controller
{
    //
    public function videoList()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/liveVideo_list', ['verify' => false]);
        // dd($request->json());
        $videoList = ($request->json());
        if ($videoList['status'] == '200') {
            $videoList = $videoList['data'];
            //dd($videoList);
            return view('liveVideos.video-list', compact('videoList'));
        }
    }

    public function addVideo()
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
         //dd($request->json());
        $courseList = ($request->json());
        $courseList = $courseList['data'];
        return view('liveVideos.add-video',compact('courseList'));
    }

    public function videoAdd(Request $request)
    {
          $request->validate([
            'videoName' => 'required',
            'videoDescription' => 'required',
        ],
        [
            'videoName.required' => 'Video Name is required',
            'videoDescription.required' => 'Video Description is required',
        ]);
        //dd($request->all());
        $videoName = $request->videoName;
        $videoDescription = $request->videoDescription;
        $courseId = $request->courseId;
        $levelId = $request->levelId;
        $videoUrl = $request->videoUrl;
        if(!isset($videoUrl)){
            $videoUrl='';
        }
        if($courseId=='Select Course'){
            $courseId='';
        }
        if($levelId=='Select Level'){
            $levelId='';
        }
        //echo $courseId.$levelId;
        //dd($request->all());
        $response = Http::post('http://173.212.217.22:5050/api/admin/add_liveVideo',
            [
                'videoName' => $videoName,
                'videoDescription' => $videoDescription,
                'courseId' => $courseId,
                'levelId' => $levelId,
                'videoUrl' => $videoUrl,
            ]
        );
        //dd($response->json());

        if ($response['status'] == '200') {
            return redirect()->route('video-list')->with('success', $response['message']);
        } else {
            return redirect()->route('video-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function editVideo($id)
    {
        $request = Http::get('http://173.212.217.22:5050/api/admin/liveVideo_Detail/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $videoDetail = ($request->json());
        //dd($videoDetail);
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
        //dd($request->json());
       $courseList = ($request->json());
       $courseList = $courseList['data'];
        if ($videoDetail['status'] == '200') {
            $videoDetail = $videoDetail['data'];
            if(isset($videoDetail['levelId']['_id'])){
                $levelId = $videoDetail['levelId']['_id'];
            }else{
                $levelId ='';
            }

            //dd($levelId);
            //dd($videoDetail);
            return view('liveVideos.edit-video', compact('videoDetail','courseList','levelId'));
        }
    }

    public function videoDelete(Request $request)
    {
      //dd($request->all());

            foreach($request->list as $list){
                $lists[] = array('livevideoId' => $list);
             }
          //dd($lists);
       $response = Http::post('http://173.212.217.22:5050/api/admin/multipleLiveVideoDelete',
            [
              'LiveVideos' => $lists,
            ]
        );
        //dd($response->json());
        if ($response['status'] == '200') {
            return redirect()->route('video-list')->with('success', $response['message']);
        } else {
            return redirect()->route('video-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function updateVideo(Request $request, $id)
    {
        $levelId = $request->levelId;
        $videoName = $request->videoName;
        $videoDescription = $request->videoDescription;
        $courseId = $request->courseId;
        $videoUrl = $request->videoUrl;
        //dd($request->all());
        if(!isset($videoUrl)){
            $videoUrl='';
        }
        if($courseId=='Select Course'){
            $courseId='';
        }
        if($levelId=='Select Level'){
            $levelId='';
        }
        $response = Http::put(
                'http://173.212.217.22:5050/api/admin/editVideo_Detail/' . $id,
                [
                    'courseId' => $courseId,
                    'levelId' => $levelId,
                    'videoName' => $videoName,
                    'videoDescription' => $videoDescription,
                    'videoUrl' => $videoUrl,
                ]
            );
        //dd($response);


        if ($response['status'] == '200') {
            return redirect()->route('video-list')->with('success', 'Video Updated successfully !');
        } else {
            return redirect()->route('video-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }
}
