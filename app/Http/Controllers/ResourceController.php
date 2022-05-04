<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ResourceController extends Controller
{
    //
    public function resourceList()
    {

        //$request = Http::get('http://173.212.217.22:5050/api/admin/resourceList', ['verify' => false]);
        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/ResourcesList/'.Session::get('userData')['_id']);
        // dd($request->json());
        $resourceList = ($request->json());
        if ($resourceList['status'] == '200') {
            $resourceList = $resourceList['data'];
            //dd($resourceList);
            return view('resource.resource-list', compact('resourceList'));
        }
        // $request = Http::get('http://173.212.217.22:5050/api/admin/assignment_list', ['verify' => false]);
        // // dd($request->json());
        // $resourceList = ($request->json());
        // if ($resourceList['status'] == '200') {
        //     $resourceList = $resourceList['data'];
        //     //dd($studentList);
        //     return view('resource.resource-list', compact('resourceList'));
        // }
    }

    public function addResource(Request $request)
    {

       $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
       //dd($request->json());
       $courseList = ($request->json());
       $courseList = $courseList['data'];
        return view('resource.add-resource',compact('courseList'));
    }



    public function resourceAdd(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'description' => 'required',

        ],
        [
            'type.required' => 'Resource Type is required',
            'name.required' => 'Name is required',
            'description.required' => 'Description is required',
        ]);
        dd($request->all());
        $name = $request->name;
        $type = $request->type;
        $description = $request->description;
        $courseId = $request->description;
        $levelId = $request->description;
        $resourceName= $request->description;
        //dd($request->all());
        if($type =='Video'){
            $resourceVideo = $request->resourceVideo;
            if(isset($resourceVideo)){
                //echo 'Image';
                $image = fopen($resourceVideo, 'r');
                $name =  $request->resourceVideo->getClientOriginalName();

                $response = Http::attach(
                    'resourceVideo', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }
        }
        if($type =='Image'){
            $resourceImage = $request->resourceImage;
            if(isset($resourceImage)){
                //echo 'Image';
                //dd($resourceImage);
                $name =  $request->resourceImage->getClientOriginalName();

                $image = fopen($resourceImage, 'r');

                $response = Http::attach(
                    'resourceImage', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }
        }
        if($type =='Pdf'){
            //dd($request->all());
            $resourcePdf  = $request->resourcePdf;

            //dd($resourcePdf);
            if(isset($resourcePdf)){
                //echo 'Image';
                $name =  $request->resourcePdf->getClientOriginalName();
                $image = fopen($resourcePdf, 'r');

                $response = Http::attach(
                    'resourcePdf', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }
        }
        if($type =='Document'){
            $resourceDocument = $request->resourceDocument;
            if(isset($resourceDocument)){
                //echo 'Image';
                $image = fopen($resourceDocument, 'r');
                $name =  $request->resourceDocument->getClientOriginalName();

                $response = Http::attach(
                    'resourceDocument', $image, $name
                )->post('http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::post(
                    'http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }
        }
        if($type ==''){

        $response = Http::post(
            'http://173.212.217.22:5050/api/admin/add_resources/'.Session::get('userData')['_id'],
            [
                'courseId' => $courseId,
                'levelId' => $levelId,
                'resourceName' => $resourceName,
            ]
        );
      }





        //dd($response->body());
        //echo $response['message'];die;
        //return response($response->body());

        if ($response['status'] == '200') {
            return redirect()->route('resource-list')->with('success', 'Resource added successfully !');
        } else {
            return redirect()->route('resource-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }



    public function editResource($id)
    {
        $request = Http::post('http://173.212.217.22:5050/api/admin/resources_detail/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $resourceDetail = ($request->json());
        $request = Http::get('http://173.212.217.22:5050/api/admin/course_list_with_name', ['verify' => false]);
        //dd($request->json());
       $courseList = ($request->json());
       $courseList = $courseList['data'];
        //dd($studentDetail);
        if ($resourceDetail['status'] == '200') {
            $resourceDetail = $resourceDetail['data'];
            //dd($resourceDetail);
            return view('resource.edit-resource', compact('resourceDetail','courseList'));
        }
    }

    public function resourceDelete(Request $request)
    {
      //dd($request->all());

            foreach($request->list as $list){
                $lists[] = array('resourcesId' => $list);
             }
          //dd($lists);
       $response = Http::post('http://173.212.217.22:5050/api/admin/multipleResourcesDelete',
            [
              'Resources' => $lists,
            ]
        );
        //dd($response->json());
        if ($response['status'] == '200') {
            return redirect()->route('resource-list')->with('success', $response['message']);
        } else {
            return redirect()->route('resource-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function updateResource(Request $request, $id)
    {

        //echo $id;   dd($request->all());


        $courseId = $request->courseId;
        $levelId = $request->levelId;
        $resourceName = $request->resourceName;
        $type = $request->type;
        if($type =='Video'){
            $resourceVideo = $request->resourceVideo;
            if(isset($resourceVideo)){
                //echo 'Image';
                $image = fopen($resourceVideo, 'r');
                $name =  $request->resourceVideo->getClientOriginalName();

                $response = Http::attach(
                    'resourceVideo', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::put(
                    'http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type =='Image'){

            $resourceImage = $request->resourceImage;
            if(isset($resourceImage)){
                //echo 'Image';
                //dd($resourceImage);echo $id;   dd($request->all());
                $name =  $request->resourceImage->getClientOriginalName();

                $image = fopen($resourceImage, 'r');

                $response = Http::attach(
                    'resourceImage', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::put(
                    'http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type =='Pdf'){
            //dd($request->all());
            $resourcePdf  = $request->resourcePdf;

            //dd($resourcePdf);
            if(isset($resourcePdf)){
                //echo 'Image';
                $name =  $request->resourcePdf->getClientOriginalName();
                $image = fopen($resourcePdf, 'r');

                $response = Http::attach(
                    'resourcePdf', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::put(
                    'http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type =='Document'){
            $resourceDocument = $request->resourceDocument;
            //echo $id;   dd($request->all());
            if(isset($resourceDocument)){
                //echo 'Image';
                $image = fopen($resourceDocument, 'r');
                $name =  $request->resourceDocument->getClientOriginalName();

                $response = Http::attach(
                    'resourceDocument', $image, $name
                )->put('http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        'type' => $type,
                    ]
                );
            }else{
                //echo 'No-Image';
                $response = Http::put(
                    'http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
                    [
                        'courseId' => $courseId,
                        'levelId' => $levelId,
                        'resourceName' => $resourceName,
                        //'type' => $type,
                    ]
                );
            }
        }
        if($type ==''){

        $response = Http::put(
            'http://173.212.217.22:5050/api/admin/edit_resources/'.$id,
            [
                'courseId' => $courseId,
                'levelId' => $levelId,
                'resourceName' => $resourceName,
            ]
        );
      }
        //dd($response->body());
        if ($response['status'] == '200') {
            return redirect()->route('resource-list')->with('success', 'Resource Updated successfully !');
        } else {
            return redirect()->route('resource-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }
}
