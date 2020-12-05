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

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'color' => 'required',

        ]);

        $event = new Event();
        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->color = $request->input('color');
        $event->rendering = 'background';

        $event->save();
       return redirect('eventos');
    }

    public function update(Request $request){
            $this->validate($request,[
                'title' => 'required',
                'start' => 'required',
                'end' => 'required',
                'color' => 'required',
            ]);
        $event = Event::find($request->id);
            $event->title = $request->input('title');
            $event->title = $request->input('start');
            $event->title = $request->input('end');
            $event->title = $request->input('color');
            $event->save();

    }

    public function destroy(Request $request){
        $event = Event::find($request->id);
        if(!$event){
            return response()->json([
                'mensagem' => 'O evento nao existe',
                'código' => '500'
            ], 500);
        }

        $event->delete();

    }

    public function show(Event $event){

        $events = Event::find($event);
        if(!$events){
            return response()->json([
                'mensagem' => 'Serviço nao encontrado',
                'código' => '500'
            ], 500);
        }
        $event->delete();
        return redirect('eventos');
    }
    public function edit(Event $event){
        $edit = 1;
        return view('admin.admin_view.edit',compact('event'));
    }
}
