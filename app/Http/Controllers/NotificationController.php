<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

class NotificationController extends Controller
{
    //

    public function employeeNotificationList ()
    {
            $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/employeeNotificationList/'.Session::get('userData')['_id']);
            //dd($request);
          //dd($request->json());
         //dd($request->json());
        $employeeList = ($request->json());
        if ($employeeList['status'] == '200') {
            $employeeList = $employeeList['data'];
            //dd($employeeList);
            return view('notification.employee-notification-list', compact('employeeList'));
        }
    }

    public function addEmployeeNotification()
    {
        // $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
        //  //dd($request->json());
        // $courseList = ($request->json());
        // $courseList = $courseList['data'];
        return view('notification.add-employee-notification');
    }

    public function employeeNotificationAdd(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ],
        [
            'subject.required' => 'Subject is required',
            'message.required' => 'Message is required',
        ]);
        $subject = $request->subject;
        $message = $request->message;
        //dd($request->all());
        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->post(config("app.server_url").'/admin/sendNotificationAllEmployees/'.Session::get('userData')['_id'],
      [
        'subject' => $subject,
        'message' => $message,
      ]);
        //dd($response);
        //


        if ($request['status'] == '200') {
            return redirect()->route('employee-notification-list')->with('success', $request['message']);
        } else {
            return redirect()->route('employee-notification-list')->with('error', 'There is some server error !' . $request['message']);
        }
     }

     public function deleteEmployeeNotification(Request $request)
     {
         //dd($request->all());
        $val =  $request->incative_val;
        $request = Http::withHeaders([
             'Authorization' => 'Bearer '.Session::get('userData')['token']])->delete(config("app.server_url").'/admin/employeeDeleteNotification/'.Session::get('userData')['_id'].'/'.$val);
         //dd($response);
         //


         if ($request['status'] == '200') {
             return redirect()->route('employee-notification-list')->with('success', 'Notification Delete Successfully !');
         } else {
             return redirect()->route('employee-notification-list')->with('error', 'There is some server error !' . $request['message']);
         }
      }


      public function userNotificationList()
      {
              $request = Http::withHeaders([
              'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/userNotificationList/'.Session::get('userData')['_id']);
              //dd($request);
            //dd($request->json());
           //dd($request->json());
          $userList = ($request->json());
          if ($userList['status'] == '200') {
              $userList = $userList['data'];
              //dd($userList);
              return view('notification.user-notification-list', compact('userList'));
          }
      }

      public function addUserNotification()
      {
          // $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
          //  //dd($request->json());
          // $courseList = ($request->json());
          // $courseList = $courseList['data'];
          return view('notification.add-user-notification');
      }

      public function userNotificationAdd(Request $request)
      {
          $request->validate([
              'subject' => 'required',
              'message' => 'required',
          ],
          [
              'subject.required' => 'Subject is required',
              'message.required' => 'Message is required',
          ]);
          $subject = $request->subject;
          $message = $request->message;
          //dd($request->all());
          $request = Http::withHeaders([
              'Authorization' => 'Bearer '.Session::get('userData')['token']])->post(config("app.server_url").'/admin/sendNotificationAllUser/'.Session::get('userData')['_id'],
        [
          'subject' => $subject,
          'message' => $message,
        ]);
          //dd($request->json());
          //


          if ($request['status'] == '200') {
              return redirect()->route('user-notification-list')->with('success', $request['message']);
          } else {
              return redirect()->route('user-notification-list')->with('error', 'There is some server error !' . $request['message']);
          }
       }

       public function deleteUserNotification(Request $request)
       {
           //dd($request->all());
          $val =  $request->incative_val;
          $request = Http::withHeaders([
               'Authorization' => 'Bearer '.Session::get('userData')['token']])->delete(config("app.server_url").'/admin/usersDeleteNotification/'.Session::get('userData')['_id'].'/'.$val);
           //dd($response);
           //


           if ($request['status'] == '200') {
               return redirect()->route('user-notification-list')->with('success', 'Notification Delete Successfully !');
           } else {
               return redirect()->route('user-notification-list')->with('error', 'There is some server error !' . $request['message']);
           }
        }

    public function send_mail(Request $request)
        {
            //dd($request->all());
            $data["email"] = "dharmendrapkukreja@gmail.com";
            $data["title"] = "From Nicesnippest.com";
            $data["body"] = "This is Demo Mail Attechment Pdf File";
            // $attechfiles = [
            //     public_path('file/test1.pdf'),
            //     public_path('file/test2.pdf'),
            // ];
            $da = [
                'title' => 'Welcome to Tutsmake.com',
                'date' => date('m/d/Y')
            ];

            $pdf = PDF::loadView('certificate', $da);

            Mail::send('emails.fileAttechmemtMail', $data, function($message)use($data,$pdf) {
                $message->to($data["email"], $data["email"])
                            ->subject($data["title"])
                            ->attachData($pdf->output(), "invoice.pdf");
                // foreach ($attechfiles as $file){
                //     $message->attach($file);
                // }
            });
            dd('Mail sent successfully Check Send Mail Email Address.');
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
