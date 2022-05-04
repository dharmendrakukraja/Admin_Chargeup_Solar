<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CareerController extends Controller
{
    //
    public function careerList()
    {

        //$request = Http::get('http://173.212.217.22:5050/api/admin/resourceList', ['verify' => false]);
        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/careerPage_List/'.Session::get('userData')['_id']);
        // dd($request->json());
        $careerList = ($request->json());
        if ($careerList['status'] == '200') {
            $careerList = $careerList['data'];
            //dd($resourceList);
            return view('career.career-list', compact('careerList'));
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


    public function detailCareer($id)
    {
        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/careerPage_Detail/'.Session::get('userData')['_id'].'/'.$id);

       //dd($request);
        //dd($request->json());
        $careerDetail = ($request->json());

       //$courseList = $courseList['data'];
        //dd($studentDetail);
        if ($careerDetail['status'] == '200') {
            $careerDetail = $careerDetail['data'];
            //dd($careerDetail);
            return view('career.detail-career', compact('careerDetail'));
        }
    }

    public function careerDelete(Request $request)
    {
      //dd($request->all());

            foreach($request->list as $list){
                $lists[] = array('careersId' => $list);
             }
          //dd($lists);
       $response = Http::post('http://173.212.217.22:5050/api/admin/multipleCareerDelete',
            [
              'Career' => $lists,
            ]
        );
        //dd($response->json());
        if ($response['status'] == '200') {
            return redirect()->route('career-list')->with('success', $response['message']);
        } else {
            return redirect()->route('career-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

}
