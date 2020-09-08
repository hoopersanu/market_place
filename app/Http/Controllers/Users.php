<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Crypt;

class Users extends Controller
{
    //
    public function submit(Request $request){
        $request->validate([
            "name"=>"required",
            "mobile"=>"min:10",
            "password"=>"min:2 | max:8"
        ]);
        return $request->input();
    }

    function register(Request $req){
        echo Crypt::encrypt('123@abc');
        // return $req->input();
    }
}
