<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function edit($id){

        $event = Event::findorfail($id);
        return  view('admin.events.edit',compact('event'));

    }
    public function update(Event $event){
        $event->update(request()->all());
        return redirect()->route('admin.events.index');

    }
    public function create(){

    }
    public function show(Event $event){
        return view('admin.events.show', compact('event'));
    }


    public function delete(Event $event)
    {

        $event->delete();
        return back();
    }




}
