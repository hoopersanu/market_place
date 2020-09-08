<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Admin;
use App\Offer;


class AdminController extends Controller
{
    //
    public function adminLogin(){
        return view('admin-login');
    }

    // ----------- [ User login validate ] ---------------
    public function loginAdmin(Request $request){
        $request->validate([
            'email'             =>      'required',
            'password'          =>      'required'
        ]);

        $email          =   $request->email;
        $password       =   $request->password;
        $admin          =    Admin::where("email", $email)->where("password", md5($password))->first();

       if(!is_null($admin)) {
            return redirect()->intended('admin-dashboard');
       }

       else {
            return back()->with("failed", "Invalid email or password. Please try again.");
       }
    }

    // ---------- [ Admin ashboard ] ------------
    public function adminDasboard() {

        $offers             =   Offer::all();
        return view("admin-dashboard", compact("offers"));
    }

    // ------------[view admin offer]------------
    public function viewAdminOffer(){
        $offers = Offer::all();
        return view('view-admin-offer',compact('offers'));
    }

    // function getAdminOffer(){
    //     $offers=  Offer::all();
    //     return view('view-admin-offer',compact('offers'));
    //  }

    //------------  [change status]  -----------

    function changeStatus($id){
        return $user = Offer::find($id);
    }


    // -------------- [Offer action ] ------------
    public function offerAction($offer_id, $status) {
        $offer = Offer::where("id", $offer_id)->update(["status" => $status]);
        if($offer == 1){
            return back()->with("success", "offer updated successfully");
        }

        else {
            return back()->with("failed", "Something went wrong");
        }
    }


    // -------------- [ Admin logout ] -------------
    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('admin-login');
    }
}
