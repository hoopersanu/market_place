<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;




class UserController extends Controller
{
    // ---------- [ index ] -----------

    public function userRegistration() {
        return view('user-registration');

    }

    // ---------- [ Save registration ] -----------
    public function saveRegistration(Request $request) {

        $request->validate([
            'name'              =>      'required',
            'email'             =>      'required|email',
            'address'           =>      'required',
            'password'          =>      'required|min:6',
            'phone'             =>      'required|min:10|numeric'
        ]);

        $name                   =       $request->name;
        $nameArray              =       explode(" ", $name);

        $first_name             =       $nameArray[0];
        $last_name              =       "";

        if(isset($nameArray[1])) {
            $last_name          =       $nameArray[1];
        }

        $dataArray          =       array(
            "first_name"            =>          $first_name,
            "last_name"             =>          $last_name,
            "full_name"             =>          $name,
            "email"                 =>          $request->email,
            "password"              =>          Hash::make($request->password),
            "phone"                 =>          $request->phone,
            "address"               =>          $request->address
        );

        // ---------------- check if email or phone already exists
        $userEmail                =       User::where("email", $request->email)->first();

        if(!is_null($userEmail)) {
            return back()->with("failed", "Email already exists. Please try again.");
        }

        $userPhone          =       User::where("phone", $request->phone)->first();

        if(!is_null($userPhone)) {
            return back()->with("failed", "Phone no. already exists. Please try again.");
        }

        $user               =           User::create($dataArray);

        if(!is_null($user)) {
            return back()->with("success", "Registration completed successfully");
        }

        else {
            return back()->with("failed", "Failed to register. Please try again.");
        }
    }

    // -------------- [ User Login ] ----------------------

    public function userLogin(){
        return view('user-login');
    }

    // ----------- [ User login validate ] ---------------
    public function loginValidate(Request $request){
        $request->validate([
            'email_phone'       =>      'required',
            'password'          =>      'required|min:6'
        ]);

        $email          =   $request->email_phone;
        $password       =   $request->password;

        $user_data      =       array(
            "email"         =>          $email,
            "password"      =>          $password
        );


        if(!Auth::attempt(['email' => $email, 'password' => $password])){

            if(!Auth::attempt(['phone' => $email, 'password' => $password])) {
                return back()->with("failed", "Invalid password. Please try again.");
            }

            else {
                return redirect()->intended('dashboard');
            }

        }



        else {
            return redirect()->intended('dashboard');
        }



        // $user           =       User::where("email", $email)->orWhere("phone", $email)->first();

        // if(!is_null($user)) {

        //     if (!Hash::check($password, $user->password)) {
        //         return back()->with("failed", "Invalid password. Please try again.");
        //     }

        //     else {
        //         return redirect()->intended('dashboard');
        //     }
        // }

        // else {
        //     return back()->with("failed", "Invalid email or phone number");

        // }
    }


    // ------------------- [ Dashboard ] ------------------
    public function dashboard() {
        // check if user logged in
        if(Auth::check()) {
            return view('dashboard');
        }

        return redirect::to("login")->withSuccess('Oopps! You do not have access');
    }

    //-------------[open add new offer]-------------------------
    public function publishNewOffer(){
        return view('publish-offer');
        // echo "hello";
    }


    // ------------- [ Logout ] ----------------
    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }


}
