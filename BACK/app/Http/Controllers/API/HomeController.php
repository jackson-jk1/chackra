<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Event;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmailController;
use Validator;

class HomeController extends Controller
{

    public function index()
    {
        $images =  Image::where('name','baner')->get();
        $galleries = Image::where('name','galery')->get();
        return view('admin.client.index',['images' =>$images
        ,'galleries'=>$galleries]);
    }

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

public function indexAdmin()
{

    return view('admin.admin_view.indexAdmin',['parameter'=>0]);
}

    public function email(Request $request)
    {
         $request->validate([
            'name' => 'required|between:3,50',
            'email' =>'required|between:5,50',
            'bodyMessage' =>'required|min:5',

        ]);
         $data = array(
             'name' => $request->name,
             'email' => $request->email,
             'bodyMessage' =>$request->bodyMessage
         );

        Mail::to('biladanoar@gmail.com')->send(new SendEmailController($data));

       return view('admin.client.index');
}


}


