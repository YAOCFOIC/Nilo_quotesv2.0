<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $events = Event::all();
        $event = [];

        foreach ($events as $row) {
            
            $event[] = \Calendar::event(
                $row->title,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }
        
        $calendar = \Calendar::addEvents($event);
        return view('home',compact('events','calendar')); 
        
    }
}
