<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function loadEvents()
    {
        $events = Event::all();
        return response()->json($events);

    }

    public function index()
    {
        $events = Event::all();
        return view('admin.admin_view.indexAdmin', ['events' =>$events,'parameter'=>1]);

    }
}
