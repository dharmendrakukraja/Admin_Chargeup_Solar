<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AnnouncementController extends Controller
{
    //

    public function announcementList ()
    {

        $request = Http::get('http://173.212.217.22:5050/api/admin/announcementList', ['verify' => false]);
        // dd($request->json());
        $announcementList = ($request->json());
        if ($announcementList['status'] == '200') {
            $announcementList = $announcementList['data'];
            //dd($announcementList);
            return view('announcement.announcement-list', compact('announcementList'));
        }
    }

    public function addAnnouncement()
    {
        // $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
        //  //dd($request->json());
        // $courseList = ($request->json());
        // $courseList = $courseList['data'];
        return view('announcement.add-announcement');
    }

    public function announcementAdd(Request $request)
    {
          $request->validate([
            'subject' => 'required',
            'message' => 'required',

        ],
        [
            'subject.required' => 'Subject is required',
            'message.required' => 'Message is required',
        ]);
        //dd($request->all());
        $subject = $request->subject;
        $message = $request->message;
        $type = $request->type;
        //$announcementImage = $request->announcementImage;

        if($type =='Video'){
            $announcementVideo = $request->announcementVideo;
            if(isset($announcementVideo)){
                //echo 'Image';
                $image = fopen($announcementVideo, 'r');
                $name =  $request->announcementVideo->getClientOriginalName();

                $response = Http::attach(
                    'announcementVideo', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
                    [
                        'subject' => $subject,
                        'message' => $message,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
                    [
                        'subject' => $subject,
                        'message' => $message,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type =='Image'){
            $announcementImage = $request->announcementImage;
            if(isset($announcementImage)){
                //echo 'Image';
                //dd($announcementImage);
                $name =  $request->announcementImage->getClientOriginalName();

                $image = fopen($announcementImage, 'r');

                $response = Http::attach(
                    'announcementImage', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
                    [
                        'subject' => $subject,
                        'message' => $message,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
                    [
                        'subject' => $subject,
                        'message' => $message,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type =='Pdf'){
            //dd($request->all());
            $announcementPdf  = $request->announcementPdf;

            //dd($announcementPdf);
            if(isset($announcementPdf)){
                //echo 'Image';
                $name =  $request->announcementPdf->getClientOriginalName();
                $image = fopen($announcementPdf, 'r');

                $response = Http::attach(
                    'announcementPdf', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
                    [
                        'subject' => $subject,
                        'message' => $message,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
                    [
                        'subject' => $subject,
                        'message' => $message,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type =='Document'){
            $announcementDocument = $request->announcementDocument;
            if(isset($announcementDocument)){
                //echo 'Image';
                $image = fopen($announcementDocument, 'r');
                $name =  $request->announcementDocument->getClientOriginalName();

                $response = Http::attach(
                    'announcementDocument', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
                    [
                        'subject' => $subject,
                        'message' => $message,
                        //'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
                    [
                        'subject' => $subject,
                        'message' => $message,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type ==''){

        $response = Http::post(
            'http://173.212.217.22:5050/api/admin/add_announcement/'.Session::get('userData')['_id'],
            [
                'subject' => $subject,
                'message' => $message,
            ]
        );
      }

        //dd($response);
        //


        if ($response['status'] == '200') {
            return redirect()->route('announcement-list')->with('success', $response['message']);
        } else {
            return redirect()->route('announcement-list')->with('error', 'There is some server error !' . $response['message']);
        }
     }

     public function editAnnouncement($id)
     {
         $request = Http::post('http://173.212.217.22:5050/api/admin/announcement_Detail/' . $id, ['verify' => false]);
         //dd($request);
         //dd($request->json());
         $announcementDetail = ($request->json());
         //dd($announcementDetail);
         $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
         //dd($request->json());
        $courseList = ($request->json());
        $courseList = $courseList['data'];
         if ($announcementDetail['status'] == '200') {
             $announcementDetail = $announcementDetail['data'];
             //dd($announcementDetail);
             return view('announcement.edit-announcament', compact('announcementDetail','courseList'));
         }
     }

     public function announcementDelete(Request $request)
     {
       //dd($request->all());

             foreach($request->list as $list){
                 $lists[] = array('announcementId' => $list);
              }
          // dd($lists);
        $response = Http::post('http://173.212.217.22:5050/api/admin/multipleAnnouncementDelete',
             [
               'Announcements' => $lists,
             ]
         );

         if ($response['status'] == '200') {
             return redirect()->route('announcement-list')->with('success', $response['message']);
         } else {
             return redirect()->route('announcement-list')->with('error', 'There is some server error !' . $response['message']);
         }
     }

     public function updateAnnouncement(Request $request, $id)
     {




         $subject = $request->subject;
         $description = $request->message;
         $type = $request->type;
         if($type =='Video'){

            $announcementVideo = $request->announcementVideo;
            if(isset($announcementVideo)){
                $image = fopen($announcementVideo, 'r');
                $name =  $request->announcementVideo->getClientOriginalName();
                $response = Http::attach(
                    'announcementVideo', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/edit_announcement/'.$id,
                    [
                        'subject' => $subject,
                        'message' => $description,
                        'type' => $type,
                    ]
                );
            }else{
                $response = Http::put('http://173.212.217.22:5050/api/admin/edit_announcement/'.$id,
                    [
                        'subject' => $subject,
                        'message' => $description,
                        'type' => $type,
                    ]
                );
            }

        }
        if($type =='Image'){
            $announcementImage = $request->announcementImage;
            if(isset($announcementImage)){
                $image = fopen($announcementImage, 'r');
                $name =  $request->announcementImage->getClientOriginalName();
                $response = Http::attach(
                    'announcementImage', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/edit_announcement/'.$id,
                    [
                        'subject' => $subject,
                        'message' => $description,
                        'type' => $type,
                    ]
                );
            }else{
                echo 'IN';echo $id;dd($request->all());

               // echo $subject; echo $description;echo $type;die;
                $response = Http::put('http://173.212.217.22:5050/api/admin/edit_announcement/'.$id,
                    [
                        'subject' => $subject,
                        'message' => $description,
                        'type' => $type,
                    ]
                );
                dd($response);
            }
        }
        if($type =='Pdf'){

            $announcementPdf = $request->announcementPdf;
            if(isset($announcementPdf)){
                $image = fopen($announcementPdf, 'r');
                $name =  $request->announcementPdf->getClientOriginalName();
                $response = Http::attach(
                    'announcementPdf', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/edit_announcement/'.$id,
                    [
                        'subject' => $subject,
                        'message' => $description,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'IN';echo $id;dd($request->all());
                echo $subject; echo $description;echo $type;die;
                $response = Http::put('http://173.212.217.22:5050/api/admin/edit_announcement/'.$id,
                    [
                        'subject' => $subject,
                        'message' => $description,
                        'type' => $type,
                    ]
                );
            }
        }

         if ($response['status'] == '200') {
             return redirect()->route('announcement-list')->with('success', 'Announcement Updated successfully !');
         } else {
             return redirect()->route('announcement-list')->with('error', 'There is some server error !' . $response['message']);
         }
     }
}
