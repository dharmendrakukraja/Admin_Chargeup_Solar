<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{

    public function index()
    {

        return view('login');
    }

    public function clients()
    {

        return view('login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',

        ]);

        $email = $request->email;
        $password = $request->password;

        $response = Http::post(config("app.server_url").'/admin/login',
            [
                'email' => $email,
                'password' => $password
            ]
        );
        //echo $response['message'];
        //dd($response->body());
        //echo $response['message'];die;
        //return response($response->body());

        if ($response['status'] == '200') {
            //dd($response['data']);
            $UsersessionData = $response['data'];
            session()->put('userData', $UsersessionData);
            //dd(Session::get('userData')['_id']);
            $sessionData =   Session::get('userData');
            //echo $sessionData['email'];dd($sessionData);
            return redirect()->route('employee-list')->with('success', 'Admin Logged In successfully !');
        } else {
            return redirect()->route('login')->with('error', $response['message']);
        }
        return redirect("login")->withErrors('These credentials do not match our records.');
    }

    public function profile(Request $request, $id)
    {
        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/adminProfileDetail/'.Session::get('userData')['_id']);

        //echo $id;
        //dd($request->json());
         $profile = $request->json();
         //dd($profile['data']);
         if($profile['status']=='200'){
            $data =  $profile['data'];
            return view('admin.profile', compact('data'));
         }
        // $response = Http::post(
        //     'http://173.212.217.22:5050/api/admin/adminDetail/',
        //     [
        //         'email' => $email,
        //         'password' => $password
        //     ]
        // );
        //echo $response['message'];
        //dd($response->body());
        //echo $response['message'];die;
        //return response($response->body());

        if ($request['status'] == '200') {
            //dd($response['data']);
            $UsersessionData = $request['data'];
            session()->put('userData', $UsersessionData);
            $sessionData =   Session::get('userData');
            echo $sessionData['email'];dd($sessionData);
            return redirect()->route('student-list')->with('success', 'Admin Logged In successfully !');
        } else {
            return redirect()->route('login')->with('error', $request['message']);
        }
        return redirect("login")->withErrors('These credentials do not match our records.');
    }


    public function registration()
    {
        return view('registration');
    }

    public function editProfile($id)
    {

        $request = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->get(config("app.server_url").'/admin/adminProfileDetail/'.Session::get('userData')['_id']);
        //$request = Http::get('http://173.212.217.22:5050/api/admin/adminDetail/' . $id, ['verify' => false]);
        //dd($request);
        //dd($request->json());
        $profileDetail = ($request->json());
        //dd($profileDetail);
        if ($profileDetail['status'] == '200') {
            $profileDetail = $profileDetail['data'];
            //dd($profileDetail);
            return view('admin.edit-profile', compact('profileDetail'));
        }
        return view('registration');
    }

    public function updateProfile(Request $request, $id)
    {
        //echo $id;dd($request->all());
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $phoneNumber = $request->phoneNumber;
        $profileImage = $request->profileImage;
        //$email = $request->email;

    // dd($request->all());die;
    if(isset($profileImage)){
        $image = fopen($profileImage, 'r');
        $name =  $request->profileImage->getClientOriginalName();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('userData')['token']])->attach(
            'profileImage', $image, $name
        )->put(config("app.server_url").'/admin/updateProfileDetails/'.$id,[
                "firstName" => $firstName,
                "lastName" => $lastName,
                "phoneNumber" => $phoneNumber,
                //"email" => $email,
            ]);
        }else{
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.Session::get('userData')['token']])->put(
                    config("app.server_url").'/admin/updateProfileDetails/'.$id,[
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "phoneNumber" => $phoneNumber,
                   // "email" => $email,
                ]);
        }
        //dd($response);
        if ($response['status'] == '200') {
            return redirect()->route('employee-list')->with('success', 'Admin Profile Updated successfully !');
        } else {
            return redirect()->route('employee-list')->with('error', 'There is some server error !' . $response['message']);
        }
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],
         [
            'name.required' => 'Userame is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',

        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("login")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('index');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
