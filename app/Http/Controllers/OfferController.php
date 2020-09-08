<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Offer;
use App\File;


class OfferController extends Controller
{
    // -------- [index ] ----------------
    public function addNewOffer() {
        return view('add-offer');
    }

    //---------[view offer]----------
    // public function viewNewOffer(){
    //     return ;
    // }

    //--------- [save add new offer into the db] ---------
    public function publishOffer(Request $request){
        $request->validate([
            'category'              =>      'required',
            'title'                 =>      'required',
            'description'           =>      'required',
        ]);


        $postData          =       array(
            "category"              =>          $request->category,
            "title"                 =>          $request->title,
            "description"           =>          $request->description,
            "photo"                 =>          $request->photo
        );

        $offer               =       Offer::create($postData);

       // file validation
        $validator      =   Validator::make($request->all(),
        ['photo'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);

            // if validation fails
            if($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            // if validation success
            if($file   =   $request->file('photo')) {

            $name      =   time().'.'.$file->getClientOriginalExtension();

            $target_path    =   public_path('/uploads/');

                if($file->move($target_path, $name)) {
                    Offer::where("id", $offer->id)->update(["photo" => $name]);
                }
            }


        if(!is_null($offer)) {
            return back()->with("success", "offer published successfully");
        }

        else {
            return back()->with("error", "Whoops! failed to publish the offer");
        }

    }


    function getOffer(){
       $offers=  Offer::all();
       return view('view-offer',compact('offers'));
    }



}
