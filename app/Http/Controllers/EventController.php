<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function index() {
       $events = Event::all();
    
        return view('welcome',['events'=> $events]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(EventRequest $request) {

        $event = Event::create($request->all());
       
        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
}
