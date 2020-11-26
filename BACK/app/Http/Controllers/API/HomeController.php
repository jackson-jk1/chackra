<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Event;
use http\Client\Response;
use Illuminate\Http\Request;
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

    return view('admin.client.indexAdmin');
}
}


