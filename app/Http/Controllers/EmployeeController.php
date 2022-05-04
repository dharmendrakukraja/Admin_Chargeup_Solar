<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF;
//use \PDF;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class EmployeeController extends Controller
{
    //

    public function employeeList()
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/employeeList/'.Session::get('userData')['_id']);
             //echo  config("app.server_url");
             //dd($request->json());
        $employeeList = ($request->json());
        if ($employeeList['status'] == '200') {
            $employeeList = $employeeList['data'];
            //dd($studentList);
            return view('employee.employee-list', compact('employeeList'));
        }
    }

    public function userList()
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/userList/'.Session::get('userData')['_id']);
             //dd($request->json());
        $userList = ($request->json());
        if ($userList['status'] == '200') {
            $userList = $userList['data'];
             //dd($studentList);
            return view('user.user-list', compact('userList'));
        }
    }

    public function userListPDF()
    {
        //echo 'PDF';die;
        $data = [
            'title' => 'Welcome to Tutsmake.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('certificate', $data);
    //     return response()->streamDownload(
    //         fn () => print($pdf),
    //         "filename.pdf"
    //    );
    Storage::put('public/pdf/invoice.pdf', $pdf->output());
    //return view('user.user-orders', compact('orderList'));
    //return $pdf->download('invoice.pdf',array('Attachment'=>true));
    $request = Http::withHeaders([
        'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/userOrderList/'.Session::get('userData')['_id']);
     //dd($request->json());
    $orderList = ($request->json());
    if ($orderList['status'] == '200') {
        $orderList = $orderList['data'];
        //echo $host = request()->getHttpHost();
        $host = request()->getHttpHost();
        //echo  $_SERVER['SERVER_NAME'];
       //dd($orderList);
        return view('user.user-orders', compact('orderList'));
    }
    }

    public function employeeOrders(Request $request)
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/employeeOrderList/'.Session::get('userData')['_id']);
         //dd($request->json());
        $orderList = ($request->json());
        if ($orderList['status'] == '200') {
            $orderList = $orderList['data'];
            //echo $host = request()->getHttpHost();
            $host = request()->getHttpHost();
            //echo  $_SERVER['SERVER_NAME'];
           //dd($orderList);
            return view('employee.employee-orders', compact('orderList'));
        }
    }

    public function userOrders(Request $request)
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/userOrderList/'.Session::get('userData')['_id']);
         //dd($request->json());
        $orderList = ($request->json());
        if ($orderList['status'] == '200') {
            $orderList = $orderList['data'];
            //echo $host = request()->getHttpHost();
            $host = request()->getHttpHost();
            //echo  $_SERVER['SERVER_NAME'];
           //dd($orderList);
            return view('user.user-orders', compact('orderList'));
        }
    }

    public function employeeOrderDetail($id)
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/employeeOrderDetail/'.Session::get('userData')['_id'].'/'.$id);
            //dd($request->json());
        $orderDetails = ($request->json());
        if ($orderDetails['status'] == '200') {
            $orderDetails = $orderDetails['data'];
            //dd($orderDetails);
            $assigned ='';
            if(!empty($orderDetails['assignEmployees'])){
                foreach($orderDetails['assignEmployees'] as $emp){
                    foreach($emp as $employee){
                        $all[] = $employee['fullName'];
                    }

                    //$students[] = array('EMP' => $emp);
                }

                foreach($all as $assign){
                    $assigned .= $assign;
                    $assigned .= ' , ';
                }
                $assigned = rtrim($assigned, ' ,');
                //dd($assigned);
            }
        }
            //dd($orderDetails);
            return view('employee.employee-order-details', compact('orderDetails','assigned'));

    }

    public function employeeOrderAssign($id)
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/employeeOrderDetail/'.Session::get('userData')['_id'].'/'.$id);
            //dd($request->json());
         $orderDetails = ($request->json());
         $Emprequest = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/employeeList/'.Session::get('userData')['_id']);
             //dd($request->json());
        $employeeList = ($Emprequest->json());
        if ($employeeList['status'] == '200') {
            $employeeList = $employeeList['data'];
            //dd($studentList);
        }
        if ($orderDetails['status'] == '200') {
            $orderDetails = $orderDetails['data'];
            $assigned ='';
            if(!empty($orderDetails['assignEmployees'])){
                foreach($orderDetails['assignEmployees'] as $emp){
                    foreach($emp as $employee){
                        $all[] = $employee['_id'];
                    }

                    //$students[] = array('EMP' => $emp);
                }


               // dd($all);
            }
            //dd($orderDetails);
            //dd($employeeList);

            return view('employee.employee-order-assign', compact('orderDetails','employeeList','all'));
        }
    }

    public function userOrderAssign($id)
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/userOrderDetail/'.Session::get('userData')['_id'].'/'.$id);
            //dd($request->json());
         $orderDetails = ($request->json());
         $Emprequest = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/employeeList/'.Session::get('userData')['_id']);
             //dd($request->json());
        $employeeList = ($Emprequest->json());
        if ($employeeList['status'] == '200') {
            $employeeList = $employeeList['data'];
            //dd($studentList);
        }
        if ($orderDetails['status'] == '200') {
            $orderDetails = $orderDetails['data'];
            $assigned ='';
            $all =[];
            if(!empty($orderDetails['assignEmployees'])){
                foreach($orderDetails['assignEmployees'] as $emp){
                    foreach($emp as $employee){
                        $all[] = $employee['_id'];
                    }

                    //$students[] = array('EMP' => $emp);
                }


               // dd($all);
            }
            //dd($orderDetails);
            //dd($employeeList);

            return view('user.user-order-assign', compact('orderDetails','employeeList','all'));
        }
    }

    public function userOrderDetail($id)
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/userOrderDetail/'.Session::get('userData')['_id'].'/'.$id);
            //dd($request->json());
        $orderDetails = ($request->json());
        if ($orderDetails['status'] == '200') {
            $orderDetails = $orderDetails['data'];
            //dd($orderDetails);
            $assigned ='';
            if(!empty($orderDetails['assignEmployees'])){
                foreach($orderDetails['assignEmployees'] as $emp){
                    foreach($emp as $employee){
                        $all[] = $employee['fullName'];
                    }

                    //$students[] = array('EMP' => $emp);
                }

                foreach($all as $assign){
                    $assigned .= $assign;
                    $assigned .= ' , ';
                }
                $assigned = rtrim($assigned, ' ,');
                //dd($assigned);
            }
            return view('user.user-order-details', compact('orderDetails','assigned'));
        }
    }


    public function employeeOrderEdit($id)
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/employeeOrderDetail/'.Session::get('userData')['_id'].'/'.$id);
             //dd($request->json());
        $orderDetails = ($request->json());
        if ($orderDetails['status'] == '200') {
            $orderDetails = $orderDetails['data'];
            //dd($orderDetails);
            return view('employee.employee-order-edit', compact('orderDetails'));
        }
    }

    public function userOrderEdit($id)
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/userOrderDetail/'.Session::get('userData')['_id'].'/'.$id);
             //dd($request->json());
        $orderDetails = ($request->json());
        if ($orderDetails['status'] == '200') {
            $orderDetails = $orderDetails['data'];
            //dd($orderDetails);
            return view('user.user-order-edit', compact('orderDetails'));
        }
    }

    public function buildingList()
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/typeBuilding_list/'.Session::get('userData')['_id']);
             //dd($request->json());
        $buildingList = ($request->json());
        if ($buildingList['status'] == '200') {
            $buildingList = $buildingList['data'];
            //dd($buildingList);
            return view('building.building-list', compact('buildingList'));
        }
    }

    public function solarList()
    {
         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/solarTypeList/'.Session::get('userData')['_id']);
            //dd($request->json());
        $solarList = ($request->json());
        if ($solarList['status'] == '200') {
            $solarList = $solarList['data'];
            //dd($solarList);
            return view('solar-type.solar-list', compact('solarList'));
        }
    }

    public function addEmployee()
    {
        return view('employee.add-employee');
    }



    public function employeeAdd(Request $request)
    {
          //dd($request->all());
        $request->validate([
            // 'fullname' => 'required',
            // 'mobileNumber' => 'required',
             'email' => 'required',
            // 'address' => 'required',
             'password' => 'required',
            // 'address' => 'required',
            // 'state' => 'required',
            // 'city' => 'required',
            // 'zipcode' => 'required'
        ],
        [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);
        $fullname = $request->fullname;
        $mobileNumber = $request->mobileNumber;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        $state = $request->state;
        $city = $request->city;
        $zipcode = $request->zipcode;

            $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->post(config("app.server_url").'/admin/add_Employee/'.Session::get('userData')['_id'], [
                'fullName' => $fullname,
                'mobileNumber' => $mobileNumber,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'state' => $state,
                'city' => $city,
                'zipcode' => $zipcode
            ]);

          //dd($request->json());
         //dd($request->body());

        if ($request['status'] == '200') {
            return redirect()->route('employee-list')->with('success', 'Employee Added  Successfully !');
        } else {
            return redirect()->route('employee-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }



    public function editEmployee($id)
    {
        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->post(config("app.server_url").'/admin/employeeDetail/'.Session::get('userData')['_id'], [
                'employeeId' => $id
            ]);
        //dd($request);
        //dd($request->json());
        $employeeDetail = ($request->json());

        if ($employeeDetail['status'] == '200') {
            $employeeDetail = $employeeDetail['data'];
            //dd($studentDetail);
            return view('employee.edit-employee', compact('employeeDetail'));
        }
    }

    public function editBuilding($id)
    {
        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/typeBuilding_Details/'.Session::get('userData')['_id'].'/'.$id);
           //dd($request);
           //dd($request->json());
        $buildingDetail = ($request->json());


        if ($buildingDetail['status'] == '200') {
            $buildingDetail = $buildingDetail['data'];
            //dd($studentDetail);
            return view('building.edit-building', compact('buildingDetail'));
        }
    }

    public function editSolar($id)
    {
        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/solarTypeDetails/'.Session::get('userData')['_id'].'/'.$id);
           //dd($request->json());
        $solarDetail = ($request->json());


        if ($solarDetail['status'] == '200') {
            $solarDetail = $solarDetail['data'];
            //dd($solarDetail);
            return view('solar-type.edit-solar', compact('solarDetail'));
        }
    }
    public function employeeDelete(Request $request, $id)
    {
      //dd($request->all());

      $request = Http::withHeaders([
        'Authorization' => 'Bearer '.Session::get('userData')['token']])->post(config("app.server_url").'/admin/deleteEmployee/'.Session::get('userData')['_id']);
        //dd($response->json());
        if ($request['status'] == '200') {
            return redirect()->route('employee-list')->with('success', $request['message']);
        } else {
            return redirect()->route('employee-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }

    public function buildingDelete(Request $request)
    {
      //dd($request->all());
      $building_id = $request->building_id;
      $request = Http::withHeaders([
        'Authorization' => 'Bearer '.Session::get('userData')['token']])->delete(config("app.server_url").'/admin/delete_typeBuilding/'.Session::get('userData')['_id'].'/'.$building_id);
        //dd($request->json());
        if ($request['status'] == '200') {
            return redirect()->route('building-list')->with('success', $request['message']);
        } else {
            return redirect()->route('building-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }


    public function employeeUpdate(Request $request, $id)
    {
        //echo $id;dd($request->all());

        //$employeeId = $request->_id;
        $fullName = $request->fullName;
        $mobileNumber = $request->mobileNumber;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        $state = $request->state;
        $city = $request->city;
        $zipcode = $request->zipcode;

        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->put(config("app.server_url").'/admin/update_employeeDetail/'.Session::get('userData')['_id'], [
                'employeeId' => $id,
                'fullName' => $fullName,
                'mobileNumber' => $mobileNumber,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'state' => $state,
                'city' => $city,
                'zipcode' => $zipcode
            ]);
            //dd($request);
          //dd($request->json());

        if ($request['status'] == '200') {
            return redirect()->route('employee-list')->with('success', 'Employee Updated successfully !');
        } else {
            return redirect()->route('employee-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }

    public function buildingUpdate(Request $request, $id)
    {
        //echo $id;dd($request->all());

        //$employeeId = $request->_id;
        $type = $request->Type;
        $description = $request->description;

        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->put(config("app.server_url").'/admin/update_typeBuilding/'.Session::get('userData')['_id'].'/'.$id, [
                'Type' => $type,
                'description' => $description,
            ]);
            //dd($request);
          //dd($request->json());

        if ($request['status'] == '200') {
            return redirect()->route('building-list')->with('success', 'Building Type Updated successfully !');
        } else {
            return redirect()->route('building-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }

    public function solarUpdate(Request $request, $id)
    {
        echo $id;dd($request->all());
        foreach($request->item as $item){
            $items[] = array('description' => $item);
         }

        $title = $request->title;
        //$employeeId = $request->_id;
        $type = $request->Type;
        $description = $request->description;

        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->put(config("app.server_url").'/admin/update_typeBuilding/'.Session::get('userData')['_id'].'/'.$id, [
                'Type' => $type,
                'description' => $description,
            ]);
            //dd($request);
          //dd($request->json());

        if ($request['status'] == '200') {
            return redirect()->route('building-list')->with('success', 'Building Type Updated successfully !');
        } else {
            return redirect()->route('building-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }

    public function employeeOrderUpdate(Request $request, $id)
    {
        //dd($request->all());

        $employeeId = $request->employeeId;
        $trackingNumber = $request->trackingNumber;
        $orderStatus = $request->orderStatus;

         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->put(config("app.server_url").'/admin/employeeOrderUpdateStatus/'.Session::get('userData')['_id'].'/'.$id, [
                'employeeId' => $employeeId,
                'trackingNumber' => $trackingNumber,
                'orderStatus' => $orderStatus
            ]);
            //dd($request);
          //dd($request->json());

        if ($request['status'] == '200') {
            return redirect()->route('employee-orders')->with('success', 'Employee Order Updated successfully !');
        } else {
            return redirect()->route('building-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }



    public function employeeOrderAssignUpdate(Request $request, $id)
    {
        //dd($request->all());

        $orderId = $request->orderId;
        $trackingNumber = $request->trackingNumber;

        foreach($request->employee as $employee){
            $employees[] = array('employeeId' => $employee);
         }

         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->post(config("app.server_url").'/admin/assignOrderToEmployee/'.Session::get('userData')['_id'], [
                'orderId' => $orderId,
                'employees' => $employees
            ]);
           // dd($request);
         // dd($request->json());

        if ($request['status'] == '200') {
            return redirect()->route('employee-orders')->with('success', 'Employee Assigned To Order Successfully !');
        } else {
            return redirect()->route('building-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }

    public function userOrderAssignUpdate(Request $request, $id)
    {
        //dd($request->all());

        $orderId = $request->orderId;
        $trackingNumber = $request->trackingNumber;

        foreach($request->employee as $employee){
            $employees[] = array('employeeId' => $employee);
         }

         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->post(config("app.server_url").'/admin/userAssignOrder/'.Session::get('userData')['_id'], [
                'orderId' => $orderId,
                'employees' => $employees
            ]);
            //dd($request);
          //dd($request->json());

        if ($request['status'] == '200') {
            return redirect()->route('user-orders')->with('success', 'Employee Assigned To Order Successfully !');
        } else {
            return redirect()->route('user-orders')->with('error', 'There is some server error !' . $request['message']);
        }
    }

    public function userOrderUpdate(Request $request, $id)
    {
        //echo $id;dd($request->all());

        $userId = $request->userId;
        $trackingNumber = $request->trackingNumber;
        $orderStatus = $request->orderStatus;

         $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->put(config("app.server_url").'/admin/userOrderUpdateStatus/'.Session::get('userData')['_id'].'/'.$id, [
                'userId' => $userId,
                'trackingNumber' => $trackingNumber,
                'orderStatus' => $orderStatus
            ]);
            //dd($request);
          //dd($request->json());

        if ($request['status'] == '200') {
            return redirect()->route('user-orders')->with('success', 'User Order Updated successfully !');
        } else {
            return redirect()->route('user-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }

    public function addBuildingType()
    {
        return view('building.add-building');
    }

    public function addSolarType()
    {
        return view('solar-type.add-solar-type');
    }

    public function buildingTypeAdd(Request $request)
    {

        $request->validate([
             'buildingType' => 'required',
             //'status' => 'required',
             'description' => 'required',
        ],
        [
            'buildingType.required' => 'Building Type is required',
            //'status.required' => 'Status is required',
            'description.required' => 'Bulding description is required',
        ]);

        //dd($request->all());
        $buildingType = $request->buildingType;
        //$status = $request->status;
        $description = $request->description;

           $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->post(config("app.server_url").'/admin/add_typeBuilding/'.Session::get('userData')['_id'], [
                    'Type' => $buildingType,
                    'description' => $description,
            ]);
           //dd($request->json());

        if ($request['status'] == '200') {
            return redirect()->route('building-list')->with('success', 'Building Type Added  Successfully !');
        } else {
            return redirect()->route('building-list')->with('error', 'There is some server error !' . $request['message']);
        }
    }

    public function solarTypeAdd(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'item[]' => 'required',
        ],
        [
            'title.required' => 'Title is required',
            'item[].required' => 'Description Item is required',
        ]);

        //dd($request->all());
        foreach($request->item as $item){
            $items[] = array('description' => $item);
         }

        $title = $request->title;
        //$status = $request->status;



            $request = Http::post(config("app.server_url").'/admin/add_solarType', [
                    'title' => $title,
                    'subDetails' => $items,
                    //'status' => $status,
            ]);

          //dd($request->json());
        //dd($request->body());
        //echo $request['message'];die;
        //return request($request->body());

        if ($request['status'] == '200') {
            return redirect()->route('add-solar-type')->with('success', 'Solar Type Added  Successfully !');
        } else {
            return redirect()->route('add-solar-type')->with('error', 'There is some server error !' . $request['message']);
        }
    }


}
