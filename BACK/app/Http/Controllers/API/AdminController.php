<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.admin_view.indexAdmin',['users' => $users,'parameter'=>3]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $admin)
    {
        $adm = User::find($request->id);
        $adm->delete();
    }
}
